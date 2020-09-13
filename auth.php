<?php
session_start();
if(!isset($_SESSION["roll"])){
	header("Location: GP_login.php");
exit(); }
?>