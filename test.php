<?php
include("includes/functions.php");
connect();
session_start();

$inventory = "12:1;1:10;4:1";
echo $inventory . "<br>";
echo redo($inventory, 4, 3);

?>