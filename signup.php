<?php 

/**
 * HomeGrub new users inserter,
 * Salih Salih, 000795395,
 * 12/6/2020 
 * 
 * This is file serves as the sign up page for new users,
 * It inserts new users to the database.
*/

session_start();
include "connect.php";

// filtering users input

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$hpassword = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$password = password_hash($hpassword,PASSWORD_BCRYPT);

// adding new users

$command = "INSERT INTO users (username, password) VALUES (?,?)";
$stmt = $dbh->prepare($command);
$params=[$username,$password];
$success = $stmt->execute($params);

?>

<!DOCTYPE html>
<html>

    <head>
        <title>🥑 HomeGrub 🍗</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="signup.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="container">
            <h1 id="headline">🥑 HomeGrub 🍗</h1>
            <br>
            
            <section>
                    
                <br>
                <form id="createUser">
                    <input type='text' id='username' name="username" placeholder='Username' required>
                    <br>
                    <input type='password' id='password' name="password" placeholder='Password' required>
                    <br><br>
                    <button type='button' id="register">Sign up</button>
                    </form>
                <br>
            
                <a href="index.html">Sign in</a>

            </section>
    

        </div>
    </body>
</html>


  

   


