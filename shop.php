<?php

include "connect.php";

session_start();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);


// selecting the user from the database 
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
        die("<p> THE USERNAME IS INCORECT  </p>");
    }
// verifying the password

    if (password_verify($password, $hashedPassword) == false) {
        die("<p> INCORRECT PASSWORD </p>");
    } else {
       
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $hashedPassword;
    }
}

$access = isset($_SESSION["username"]);

if ($access) {
	$SQL = $dbh->prepare("SELECT * from shop, users where username = ?");
	$SQL->execute([$_SESSION["username"]]);
?>

<html lang="en">
    <head>
        <title>HomeGrub</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="addItem.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="container">
            <h1 id="headline">🥑 HomeGrub 🍗</h1>
            <h2>What would you like to do <?=$_SESSION["username"]?>?</h2>

            <div id="nav">
                <a href="cart.php">Cart 🛒</a>
                <a href="requests.php">Requests 🍳</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>

            <div class="shop">
                <?php
                    while ($row = $SQL->fetch()) {
                        echo "<div class='shopItems'>";
                        echo "<div class='itemNumber'>Item number: " . $row["itemNumber"] . "</div>";
                        echo "<div class='itemName'>Item name: " . $row["itemName"] . "</div>";
                        echo "<div class='maker'>Maker: " . $row["maker"] . "</div>";
                        echo "<div class='price'>Price: $" . $row["price"] . "</div>";

                        echo"<br>";
                        echo "<div class='image'><img src='images/".$row["image"].'.png'." ' alt='😞' width='100' height='100'></div>";
                        echo"<br>";
                        echo "<button class='addBtn'' id='submit' data=" .  $row["itemNumber"]  . ">Add to cart</button>";
                        echo "</div>";
                        }
                    } else { echo "<h1>Please Sign in</h1>"; }
                ?>
            </div>

        </div>

    </body>
</html>