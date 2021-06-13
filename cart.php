<?php

session_start();
include "connect.php";

// this php is to INSERT THE ITEMS INTO THE CART AND DISPLAY THEM INTO A HMTL FILE 

$access = isset($_SESSION["username"]);

if ($access) {
    $command = $dbh->prepare(
        "SELECT c.username, c.itemid, c.qty, s.itemNumber, s.itemName, s.price, s.image
        FROM cart c
        JOIN users u
        ON c.username = u.username
        JOIN shop s
        ON c.itemid = s.itemNumber
        WHERE c.username = ?"
    );
}
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
            <h2>What would you like to do <?=$_SESSION["username"]?>?</h2>

            <div id="nav">
                <a href="shop.php">Shop 🏪</a>
                <a href="requests.php">Requests 🍳</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>
        
    
            <section>
            
                <?php
                  if($command->execute([$_SESSION['username']])){
                    echo "<br>";

                    while($row = $command->fetch()){
                        echo "<br>";
                        echo "<div class='itemNumber'>Item number: " . $row["itemNumber"] . "</div>";
                        echo "<div class='itemNumber'>Item name: " . $row['itemName'] . "</div>";
                        echo "<div class='price'>Price: $" . $row["price"] . "</div>";

                        echo"<br>";
                        echo "<div class='image'><img src='images/".$row["image"].'.png'." ' alt='Icon' width='100' height='100'></div>";
                        echo"<br>";
                        echo "<br>";
                    }
                }?>

            </section>
    
        </div>
    </body>
</html>
