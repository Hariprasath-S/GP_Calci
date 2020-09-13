<?php
require('db.php');
session_start();
$roll_no = $_SESSION['roll'];
if (isset($_POST['cgp'])){
$cgp = $_POST['cgp'];
$gp = $_POST['gp'];
$current_sem = $_POST['current_sem'];

$ml = $_POST['ml'];
$soft = $_POST['soft'];
$dsp = $_POST['dsp'];
$pe2 = $_POST['pe2'];
$oe2 = $_POST['oe2'];
$oe3 = $_POST['oe3'];
$mllab = $_POST['mllab'];
$ostlab = $_POST['ostlab'];



// ml
// soft
// dsp
// pe2
// oe2
// oe3
// mllab
// ostlab


$sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no';";


$sqlCommand .= "UPDATE `sem6` SET 
	ml='$ml',
	soft='$soft',
	dsp='$dsp',
	pe2='$pe2',
	oe2='$oe2',
	oe3='$oe3',
	mllab='$mllab',
	ostlab='$ostlab',
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