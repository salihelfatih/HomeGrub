/**
 * 
 * This file adds the items to the cart.
*/

window.addEventListener("load", function(event){

    addItem();
    function addItem(){
        let addButton = document.getElementsByClassName("cartBtn");
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