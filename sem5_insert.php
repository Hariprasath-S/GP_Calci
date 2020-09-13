<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if (isset($_POST['cgp'])){
$cgp = $_POST['cgp'];
$gp = $_POST['gp'];
$current_sem = $_POST['current_sem'];

$tech = $_POST['tech'];
$web = $_POST['web'];
$dcn = $_POST['dcn'];
$ada = $_POST['ada'];
$pe1 = $_POST['pe1'];
$oe1 = $_POST['oe1'];
$dcnlab = $_POST['dcnlab'];
$weblab = $_POST['weblab'];



// tech
// web
// dcn
// ada
// pe1
// oe1
// dcnlab
// weblab


$sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no';";


$sqlCommand .= "UPDATE `sem5` SET 
	tech='$tech',
	web='$web',
	dcn='$dcn',
	ada='$ada',
	pe1='$pe1',
	oe1='$oe1',
	dcnlab='$dcnlab',
	weblab='$weblab',	
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