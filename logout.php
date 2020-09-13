<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if(session_destroy())
{
	 // $update = "UPDATE `users` SET `new_user` = 0 where roll=$roll_no";
	 // mysqli_query($myConnection,$update);
	header("Location: GP_login.php");
}
?>


