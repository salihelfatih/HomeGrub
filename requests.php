<?php

session_start();
include "connect.php";


// adding new items to the shopping list

$itemName = filter_input(INPUT_POST, "itemName", FILTER_SANITIZE_SPECIAL_CHARS);
$maker = filter_input(INPUT_POST, "maker", FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);


if ($itemName !== null && $maker !== null && $price !== null)
  {
		$SQL = $dbh->prepare("INSERT INTO shop (itemName, maker, price) VALUES (?,?,?)");
		$insert = [$itemName, $maker,  $price];
		if($SQL->execute($insert)){
			echo '<div id="message">Congrats, the item is added to the shop!</div>';
		} else {
			echo '<div id="message">Sorry, something went wrong. Please try again!</div>';
		}
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
                <a href="cart.php">Cart 🛒</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>

            <section> 
                <form id="newItems" method="POST">
                
                    <h3>New Item details</h3>
                    <input type='text' id='itemName' name="itemName" placeholder='Item name' required><br>
                    <input type='text' id='maker' name="maker" placeholder='Maker name' required><br>
                    <input type='text' id='price' name="price" placeholder='Price' required><br><br>

                    <button id="newItemBtn">Add new item</button>
                </form>
            </section>

        </div>

    </body>

</html>