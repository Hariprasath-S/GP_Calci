<?php 
require('db.php');
require('auth.php');
$roll_no = $_SESSION['roll'];
$sql = "SELECT * FROM users where roll='$roll_no'";

$result1 = mysqli_query($myConnection,$sql);         
$array = mysqli_fetch_row($result1);                      
echo json_encode($array);

?>