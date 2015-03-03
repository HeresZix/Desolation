<?php
include("includes/functions.php");
connect();
session_start();

$inventory = getSerializedInventory($_SESSION['uid']);

$coord1 = mt_rand(100, 999);
$coord2 = mt_rand(100, 999);
echo $coords = $coord1 . $coord2;

?>