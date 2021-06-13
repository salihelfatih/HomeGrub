<?php
session_start();
include "connect.php";

/**
 * HomeGrub shop and users checker,
 * Salih Salih, 000795395,
 * 12/6/2020
 * 
 * This file serves as the home page for the users,
 * It will fetch all the shop items from the database and display them.
*/

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);


// selecting the users from database 
if ($username !== null && $password !== null) {
    $command = "SELECT * from users where username = ?";
    $stmt = $dbh->prepare($command);
    $params = [$username];
    $success = $stmt->execute($params);
    $row = $stmt->fetch();
    $hashedPassword = $row[2];

/// verifying the username
    if ($row == false) {
        session_destroy();
        die("<h1>Nice try! Please use a valid username.</h1>");
    }

// verifying the password
    if (password_verify($password, $hashedPassword) == false) {
        die("<p>Nice try! Please remember your password.</p>");
    } else {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $hashedPassword;
    }
}

// fetching and showing the items

$userAccess = isset($_SESSION["username"]);

if ($userAccess) {
	$SQL = $dbh->prepare("SELECT * from shop, users where username = ?");
	$SQL->execute([$_SESSION["username"]]);
?>

<html lang="en">
    <head>
        <title>🥑 HomeGrub 🍗</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="addToCart.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="container">
            <h1 id="headline">Shop 🏪</h1>

            <div id="nav">
                <a href="cart.php">Cart 🛒</a>
                <a href="requests.php">Requests 🍳</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>

            

            <div class="shop">
                <?php

                    while ($row = $SQL->fetch()) {
                        echo "<div class='items'>";
                            echo"<br>";
                            echo "<div class='itemNumber'>" . $row["itemNumber"] . "</div>";
                            echo "<div class='itemName'>" . $row["itemName"] . "</div>";
                            echo "<div class='maker'>" . $row["maker"] . "</div>";
                            echo "<div class='price'>$" . $row["price"] . "</div>";
                            echo"<br>";
                            echo "<div class='image'><img src='images/".$row["image"].'.png'." ' alt='🍕🍕🍕' width='100' height='100'></div>";
                            echo"<br>";
                            echo "<button class='cartBtn' id='cartBtn' type='button' data=" .  $row["itemNumber"]  . ">Add to cart</button>";
                
                        echo "</div>";
                    }	
                    

                    } else{ echo "<h1>Please Sign in</h1>"; }

                ?>

            </div>
        </div>

    </body>
    
</html>