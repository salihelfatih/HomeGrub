<?php 
session_start();

/**
 * HomeGrub user sign out,
 * Salih Salih, 000795395,
 * 12/6/2020 
 * 
 * This file serves as the adios page for the users.
*/

$access = isset($_SESSION["username"]);

if ($access) {
    session_unset();
    session_destroy();
}

?>

<html lang="en">
    <head>
        <title>🥑 HomeGrub 🍗</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="container">
            <h1 id="headline">🥑 HomeGrub 🍗</h1>
            <br>

            <section>
                <h3>Take it easy!</h3>
                <a href="index.html">Sign back in</a>
                <br><br>
            </section>

        </div>
    </body>
</html>