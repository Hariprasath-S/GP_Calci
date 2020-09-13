<?php
require('db.php');
if(isset($_POST['reset_roll'])){
	// $reset_roll = stripslashes($_REQUEST['reset_roll']);
	// $reset_roll = mysqli_real_escape_string($con,$username);
	// $reset_pass = stripslashes($_REQUEST['reset_pass']);
	// $reset_pass = mysqli_real_escape_string($con,$password);
	$reset_roll = $_POST['reset_roll'];
	$reset_pass = $_POST['reset_pass'];

	$check_if_present = "SELECT roll from users where roll='$reset_roll'";
    $check_rows=mysqli_query($myConnection, $check_if_present) or die(mysqli_error($myConnection));
     $rows = mysqli_num_rows($check_rows);
   
     if($rows==0){
       echo "<span style='color:red; font-weight:bold; text-align:center;'>
 Please enter the correct roll number!
 </span>"; ;
     }else{
     	$update = "UPDATE `users` SET `pass` = '".md5($reset_pass)."' where roll='$reset_roll';";
	$update .= "UPDATE `users` SET `unhash_pass` = '$reset_pass' where roll='$reset_roll'";
	$sqlCommand = mysqli_multi_query($myConnection,$update) or die(mysqli_error($myConnection));
	if($sqlCommand){
		echo '<span style="color:green; font-weight:bold; text-align:center;">Password reset successful! You can login Now.</span>';
	} 
	else{
		echo '<span style="color:red; font-weight:bold; text-align:center;">Password reset Unsuccessful!</span>';
	}
     
     }










	
}
else{
	echo "Something went wrong! Try again Later";
}



?>