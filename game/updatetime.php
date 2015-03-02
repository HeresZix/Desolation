<?php

include ("../includes/functions.php");
connect();
session_start();

date_default_timezone_set('Australia/Melbourne');
$mysql_date_now = date("Y-m-d H:i:s");

$id = $_SESSION['uid'];

mysql_query("UPDATE `desolation`.`misc_data` SET `timesinceloot` = '$mysql_date_now' WHERE `misc_data`.`id` = '$id';") or die(mysql_error());

header("Location: ../game/");

?>