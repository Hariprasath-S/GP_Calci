<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if (isset($_POST['cgp'])){
$cgp = $_POST['cgp'];
$gp = $_POST['gp'];
$current_sem = $_POST['current_sem'];

$ptas = $_POST['ptas'];
$dld = $_POST['dld'];
$ece = $_POST['ece'];
$mpmc = $_POST['mpmc'];
$dsalab = $_POST['dsalab'];
$dsa = $_POST['dsa'];
$oops = $_POST['oops'];
$ese = $_POST['ese'];
$dldlab = $_POST['dldlab'];

// ptas
// dld
// ece
// mpmc
// dsalab
// dsa
// oops
// ese
// dldlab
// gpa


$sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no';";


$sqlCommand .= "UPDATE `sem3` SET 
	ptas='$ptas',
	dld='$dld',
	ece='$ece',
	mpmc='$mpmc',
	dsalab='$dsalab',
	dsa='$dsa',
	ese='$ese',
	oops='$oops',
	dldlab='$dldlab',
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