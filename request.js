/**
 * HomeGrub request maker,
 * Salih Salih, 000795395,
 * 12/6/2020
 * 
 * This file adds the newly requested items to the shop.
*/

window.addEventListener("load", function(event){
    

    let button = document.getElementById("request");
    
    button.addEventListener("click",function(){
        event.preventDefault();
        $("section").css("background-color",  "#6e58ee");

        let itemNumber = document.getElementById("itemNumber");
        let itemName = document.getElementById("itemName");
        let maker = document.getElementById("maker");
        let price = document.getElementById("price");
        let image= document.getElementById("image");

        let url = "itemNumber=" + itemNumber.value + "&itemName=" + itemName.value + "&maker=" + maker.value +
         "&price=" + price.value + "&image=" + image.value;

         fetch("newItem.php", {
             method:'POST', 
             credentials: 'include',
             headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
             body: url  
            })

            .then(response => response.text())
            .then(function(){
                console.log("Yooo the item is to the database.");
            });
    });

});

