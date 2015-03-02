<?php
session_start();

include("../../includes/functions.php");
connect();

$id = $_SESSION['uid'];
mysql_query("UPDATE `desolation`.`users` SET `gamestate` = '2' WHERE `users`.`id` = '$id';") or die(mysql_error());

if (isset($_SESSION['uid'])) {
	include("index.html");
} else {
	header("Location: ../../");
}
?>