<?php 
session_start();

$access = isset($_SESSION["username"]);


if ($access) {
    session_unset();
    session_destroy();
}

?>

<html lang="en">
<head>
<title>HomeGrub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <section>
        <h3>Take it easy!</h3>
        <a href="index.html">Sign in</a>
        <br>
    </section>
</body>