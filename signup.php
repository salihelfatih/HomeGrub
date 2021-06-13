<?php 

/**
 * This file adds new users to the database 
*/

include "connect.php";

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$hpassword = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$password = password_hash($hpassword, PASSWORD_BCRYPT);


$command = "INSERT INTO users (username, password) VALUES (?,?)";
$stmt = $dbh->prepare($command);
$params=[$username,$password];
$success = $stmt->execute($params);

?>

<!DOCTYPE html>
<html>
<head>
    <title>HomeGrub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <body>
        <div id="container">
            <h1 id="headline">🥑 HomeGrub 🍗</h1>
            <br>
            <section>
                <form id="createUser">
                    <input type='text' id='username' name="username" placeholder='Username' required>
                    <br>
                    <input type='password' id='password' name="password" placeholder='Password ' required>
                    <br>
                    <br>
                    
                    <button class="submit" id="signup">Sign up</button>
                </form>
                <br>
                <h3 id="success">Thank you for signing up!</h3>
                <a href="index.html">Sign in</a>
            </section>
        </div>
    </body>
</html>

