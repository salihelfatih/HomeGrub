<?php 
session_start();

/**
 * HomeGrub requests,
 * Salih Salih, 000795395, 
 * 12/6/2020
 * 
 * This file specifies the new requests page.
*/

?>

<!DOCTYPE html>
<html>

<head>
    <title>🥑 HomeGrub 🍗</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="request.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <body>
        <div id="container">
            <h1 id="headline">Requests 🍳</h1>

            <div id="nav">
                <a href="shop.php">Shop 🏪</a>
                <a href="cart.php">Cart 🛒</a>
                <a href="signout.php">Sign Out 🚪</a>
                <br><br>
            </div>

            <section>
                <form id="createKanban" method='POST' >
                    <h3>New Item Details</h3>
                    <input type='number' id='itemNumber' name="itemNumber" placeholder='Item Number' required><br>
                    <input type='text' id='itemName' name="itemName" placeholder='Item Name' required><br>
                    <input type='text' id='maker' name="maker" placeholder='Maker' required><br>
                    <input type='number' id='price' name="price" placeholder='Price' required><br>
                    <input type='number' id='image' name="image" placeholder='Image number' required><br><br>

                    <button id="request">Request</button>
                </form> 
                <br>

            </section>
    
        </div>
    </body>
</html>