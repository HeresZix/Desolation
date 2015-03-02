<?php
include("includes/functions.php");
connect();
session_start();

$inventory = getSerializedInventory($_SESSION['uid']);

$items = explode(";", $inventory);
$arrlength = count($items);
for ($x = 0; $x < $arrlength; $x++) {
	$item = explode(":", $items[$x]);
	echo $items[$x] . "<br>";
	
	echo $item[0] . "<br>";
	echo $item[1] . "<br><br>";
}

?>