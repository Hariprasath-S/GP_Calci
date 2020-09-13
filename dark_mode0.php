<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if(isset($_POST['darkmode']))
{
	$dark = $_POST['darkmode'];

$sqlCommand = "UPDATE `users` SET `darkmode` = $dark where roll='$roll_no'";




$query=mysqli_query($myConnection,$sqlCommand) or die (mysqli_error($myConnection));



}

        

 


?>