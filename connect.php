<?php

/**
 * HomeGrub database connector,
 * Salih Salih, 000795395,
 * 12/6/2020
 * 
 * This file connects to the database.
*/

// connecting to database and throwing exceptions if there's an issue
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=saloohi",
        "root",
        "" );
    } 
  
catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
