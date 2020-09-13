<?php
require('db.php');
$roll=$_POST['roll'];
if(!empty($roll)){
	$truncate =  "DELETE from sem1 where roll='$roll';";
	$truncate .= "DELETE from sem2 where roll='$roll';";
	$truncate .= "DELETE from sem3 where roll='$roll';";
	$truncate .= "DELETE from sem4 where roll='$roll';";
	$truncate .= "DELETE from sem5 where roll='$roll';";
	$truncate .= "DELETE from sem6 where roll='$roll';";
	$truncate .= "DELETE from sem7 where roll='$roll';";
	$truncate .= "DELETE from sem8 where roll='$roll';";
	$truncate .= "INSERT INTO `sem1` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem2` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem3` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem4` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem5` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem6` (`roll`) VALUES ('$roll');";
	$truncate .= "INSERT INTO `sem7` (`roll`) VALUES ('$roll');";
	$truncate .= "UPDATE `users` set CGPA=0,GPA=0,curr_sem=0,new_user=1 where roll = '$roll';";
	$truncate .= "INSERT INTO `sem8` (`roll`) VALUES ('$roll')";
	$query=mysqli_multi_query($myConnection,$truncate) or die (mysqli_error($myConnection));
}else{
	echo '<span>No user specified!</span>';
}


?>