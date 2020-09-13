<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
require('db.php');

session_start();

$roll_no = $_SESSION['roll'];



// $gpa1 = $_POST['GPAs'];
// $gpa2 = $_POST['GPAs'];
$data = json_decode(stripslashes($_POST['GPA']));
$cur_sem = $_POST['current_sem'];
//$data[0],$data[1] are the GPAs

$sqlCommand =  "UPDATE `sem1` SET `gpa` = $data[0] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem2` SET `gpa` = $data[1] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem3` SET `gpa` = $data[2] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem4` SET `gpa` = $data[3] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem5` SET `gpa` = $data[4] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem6` SET `gpa` = $data[5] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem7` SET `gpa` = $data[6] where roll='$roll_no';";
$sqlCommand .= "UPDATE `sem8` SET `gpa` = $data[7] where roll='$roll_no';";
$sqlCommand .= "UPDATE `users` SET `curr_sem` = $cur_sem where roll='$roll_no'";



$query=mysqli_multi_query($myConnection,$sqlCommand) or die (mysqli_error($myConnection));
echo "Hello";



// $sqlCommand = "UPDATE `users` SET `CGPA` = '$cgp' where roll='$roll_no';";
// $sqlCommand .= "UPDATE `users` SET `GPA` = '$gp' where roll='$roll_no';";
// $sqlCommand .= "UPDATE `users` SET `new_user` = 0  where roll='$roll_no';";
// $sqlCommand .= "UPDATE `users` SET `curr_sem` = '$current_sem'  where roll='$roll_no'";
// $query=mysqli_multi_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));



        if($query){
        	
  				echo "<span style='color:red; font-weight:bold; text-align:center;'>
 Success!
 </span>"; ;
   
            
        }
    else{
    echo "Something went wrong. Please try again later.";

  }

 


?>