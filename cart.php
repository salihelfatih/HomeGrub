<?php

/**
 * HomeGrub cart,
 * Salih Salih, 000795395,
 * 12/6/2020
 * 
 * This file specifies the cart page,
 * it adds the selected items to the cart and shows them.
*/

session_start();
include "connect.php";

$access = isset($_SESSION["username"]);

if ($access) {

    $itemNumber = filter_input(INPUT_POST, "itemid", FILTER_VALIDATE_INT);

    if ($itemNumber !== null && $itemNumber !== false) {
        $command = $dbh->prepare("INSERT INTO cart VALUES (?,?,?)");

        if($command->execute([$_SESSION['username'], $itemNumber, 1])){     
                    echo "all good bro!" ;
        }
        
    }
}

$access = isset($_SESSION["username"]);

if ($access) {


    $command = $dbh->prepare(
        "SELECT c.username, c.itemid, c.qty, s.itemNumber, s.itemName, s.price, s.image
        FROM cart c 
        JOIN users u ON c.username = u.username 
        JOIN shop s ON c.itemid = s.itemNumber 
        WHERE c.username = ?" 
    );
}

?>

<!DOCTYPE html>
<html>

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
            <h1 id="headline">Cart 🛒</h1>

            <div id="nav">
                <a href="shop.php">Shop 🏪</a>
                <a href="requests.php">Requests 🍳</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>
    
            <section>
                <div class="cart">
                    <?php
                    if($command->execute([$_SESSION['username']])){

                        while($row = $command->fetch()){
                            echo "<br>";
                            echo "<div class='image'><img src='images/".$row["image"].'.png'." ' alt='🍕🍕🍕' width='100' height='100'></div>";
                            echo "<div class='image'>" . $row["itemNumber"] . "</div>";
                            echo "<div class='image'>" . $row['itemName'] . "</div>";
                            echo "<div class='price'>$" . $row["price"] . "</div>";
                            echo "<br>";
                        }
                
                    }?>
                </div>
            </section>
    
        </div>
    </body>
</html>



