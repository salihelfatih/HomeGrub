<?php 
session_start();
include "connect.php";

/**
 * HomeGrub new request database inserter,
 * Salih Salih, 000795395, 
 * 
 * This file adds the newly requested items to the shop.
*/

$itemNumber = filter_input(INPUT_POST, "itemNumber", FILTER_VALIDATE_INT);
$itemName = filter_input(INPUT_POST, "itemName", FILTER_SANITIZE_SPECIAL_CHARS);
$maker = filter_input(INPUT_POST, "maker", FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);
$image = filter_input(INPUT_POST, "image",  FILTER_SANITIZE_SPECIAL_CHARS);



if ($itemNumber !== null &&  $itemName !== null && $maker !== null && $price !== null && $image !== false)
  {
		$SQL = $dbh->prepare("INSERT INTO shop (itemNumber, itemName, maker, price, image) VALUES(?,?,?,?,?)");
		$insert = [$itemNumber, $itemName, $maker,  $price, $image];
		if ($SQL->execute($insert)) {
			echo "Item added to the shop!";
		}else{
			echo "Item not added to the shop!";
		}
}else{
	echo "Whoops, somebody call 911!";
}