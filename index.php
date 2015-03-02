<?php
session_start();

if (isset($_SESSION['uid'])) {
	header("Location: game/");
} else {
	include("index.html");
}
?>