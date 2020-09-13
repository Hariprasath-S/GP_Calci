<?php 
require('db.php');
require('auth.php');
$roll_no = $_SESSION['roll'];

$sql = "SELECT a.gpa,b.gpa,c.gpa,d.gpa,e.gpa,f.gpa,g.gpa
		from sem1 a 
		join sem2 b on a.roll=b.roll 
		join sem3 c on a.roll=c.roll 
		join sem4 d on a.roll=d.roll 
		join sem5 e on a.roll=e.roll 
		join sem6 f on a.roll=f.roll 
		join sem7 g on a.roll=g.roll 
		
		where a.roll='$roll_no'
		";
$result1 = mysqli_query($myConnection,$sql);	         
$array = mysqli_fetch_row($result1);                      
echo json_encode($array);

?>