<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if (isset($_POST['cgp'])){
$cgp = $_POST['cgp'];
$gp = $_POST['gp'];
$current_sem = $_POST['current_sem'];

$ethics = $_POST['ethics'];
$cns = $_POST['cns'];
$iot = $_POST['iot'];
$pe3 = $_POST['pe3'];
$pe4 = $_POST['pe4'];
$oe4 = $_POST['oe4'];
$iotlab = $_POST['iotlab'];
$mini = $_POST['mini'];



// ethics
// cns
// iot
// pe3
// pe4
// oe4
// iotlab
// mini

$sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no';";


$sqlCommand .= "UPDATE `sem7` SET 
	ethics='$ethics',
	cns='$cns',
	iot='$iot',
	pe3='$pe3',
	pe4='$pe4',
	oe4='$oe4',
	iotlab='$iotlab',
	mini='$mini',
	
	gpa='$gp' 
	WHERE roll='$roll_no'";


$query=mysqli_multi_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));



        if($query){
        	
  				echo "<span style='color:red; font-weight:bold; text-align:center;'>
 Succes!
 </span>"; ;
   
            
        }
    else{
    echo "Something went wrong. Please try again later.";

  }
}
 


?>