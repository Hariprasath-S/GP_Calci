<?php 
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
$sql = "SELECT gpa FROM sem8 where roll='$roll_no'";
$result1 = mysqli_query($myConnection,$sql);         
$array = mysqli_fetch_row($result1);                      
echo json_encode($array);

?>