<?php
require('db.php');
if(isset($_POST['roll']))
{    
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

     $check_if_present = "SELECT roll from users where roll='$roll'";
     $check_rows=mysqli_query($myConnection, $check_if_present) or die(mysqli_error($myConnection));
     $rows = mysqli_num_rows($check_rows);
     
     if($rows>=1){
       echo "<span style='color:red; font-weight:bold; text-align:center;'>
 This user already exists!
 </span>"; ;
     }
     else{
        $sqlCommand="INSERT into `users` (roll,name,email,pass,created,unhash_pass)
VALUES ('$roll','$name', '$email',  '".md5($pass)."'  ,now(),'$pass');";
        $sqlCommand.="INSERT INTO `sem1` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem2` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem3` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem4` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem5` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem6` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem7` (`roll`) VALUES ('$roll');";
        $sqlCommand.="INSERT INTO `sem8` (`roll`) VALUES ('$roll')";
$query=mysqli_multi_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));
        
        if($query){




            echo "<span style='color:green; font-weight:bold; text-align:center;'>
 You can login now.
 </span>"; ;

echo "<script>

$('.pop').show();
        gsap.from('.pop', {
            duration: 2,
            opacity: 0,
            rotation: 360,
            y: -1000,
            ease: 'bounce'
        });
</script>";

            //header("location: GP_login.php");
        }
    else{
    echo "Something went wrong. Please try again later.";

  }
     } 
 }


 ?>
