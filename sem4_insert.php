<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if (isset($_POST['cgp'])){
$cgp = $_POST['cgp'];
$gp = $_POST['gp'];
$current_sem = $_POST['current_sem'];

$rmt = $_POST['rmt'];
$eds = $_POST['eds'];
$coa = $_POST['coa'];
$ddm = $_POST['ddm'];
$oslab = $_POST['oslab'];
$ict = $_POST['ict'];
$os = $_POST['os'];
$coi = $_POST['coi'];
$ddmlab = $_POST['ddmlab'];


// rmt
// eds
// coa
// ddm
// oslab
// ict
// os
// coi
// ddmlab


$sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no';";


$sqlCommand .= "UPDATE `sem4` SET 
	rmt='$rmt',
	eds='$eds',
	coa='$coa',
	ddm='$ddm',
	ict='$ict',
	os='$os',
	coi='$coi',
	ddmlab='$ddmlab',
	oslab='$oslab',
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