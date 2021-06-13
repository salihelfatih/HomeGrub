window.addEventListener("load", function(event){

    $("#success").hide();
    let signup = document.getElementById("signup");
    signup.addEventListener("click", function(){
        event.preventDefault();
        
        let username = document.getElementById("username"); 
        let password = document.getElementById("password");
        let params = "username=" + username.value + "&password=" + password.value;


        fetch("signup.php", {
            method:'POST', 
            credentials: 'include',headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
            body: params  
        })
            .then(response => response.text())
            .then(function(){
                console.log("the user has been added to DB");
                $("#success").show().delay(5000).fadeOut();
            });
    });

    let newItemBtn = document.getElementById("newItemBtn");
    
    newItemBtn.addEventListener("click", function(){
        event.preventDefault();

        let itemNumber = document.getElementById("itemNumber");
        let itemName = document.getElementById("itemName");
        let maker = document.getElementById("maker");
        let price = document.getElementById("price");
        let image = document.getElementById("image");
        let url = "itemNumber=" + itemNumber.value + "&itemName=" + itemName.value + "&maker=" + maker.value +
         "&price=" + price.value + "&image=" + image.value;

         fetch("requests.php", {method:'POST', credentials: 'include',headers: { "Content-Type": "application/x-www-form-urlencoded" }, body: url  })
            .then(response => response.text())
            .then(function(){
                console.log("the item has been added!");
        
            });
    });

    addItem();
    function addItem(){
        let addButton = document.getElementsByClassName("addBtn");
        for (let y = 0; y < addButton.length; y++) {
            let itemid = addButton[y].getAttribute("data");
            addButton[y].addEventListener('click', function(){
                let url = "itemid=" + itemid;
                console.log(url);
                
                fetch("cart.php", {
                    method: 'POST',
                    credentials: 'include',
                    headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
                    body: url 
                })
    
                .then(response => response.text())
                .then(function (d){
                    console.log(d);
                });

        });
      }
    }
    
});