<?php
include("../includes/functions.php");
session_start();
connect();

$id = $_SESSION['uid'];
mysql_query("UPDATE `desolation`.`users` SET `gamestate` = '1' WHERE `users`.`id` = '$id';") or die(mysql_error());
header("Location: ../game/");
?>