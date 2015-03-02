<?php
session_start();
include("../includes/functions.php");
connect();

if (isset($_SESSION['uid'])) {
	include("index.html");
} else {
	header("Location: ../");
}
?>