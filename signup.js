/**
 * HomeGrub sign up manager,
 * Salih Salih, 000795395,
 * 12/6/2020 
 * 
 * This is file runs the JS commands to add new users.
*/

window.addEventListener("load", function(event){
    
    let button = document.getElementById("register");
    button.addEventListener("click",function() {
        event.preventDefault();
        $("section").css("background-color",  "#6e58ee");
        let username = document.getElementById("username"); 
        let password = document.getElementById("password");
        let url = "username=" + username.value + "&password=" + password.value;


        fetch("signup.php", {
            method:'POST', 
            credentials: 'include',
            headers: { 
                "Content-Type": "application/x-www-form-urlencoded" }, 
                body: url  
            })

            .then(response => response.text())
            .then(function(){
                console.log("the user is added!");
            });
    });
    

});

