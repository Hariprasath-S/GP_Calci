<?php
require('db.php');
session_start();
$incorrect = "";
if (isset($_REQUEST['username'])){
	
	$username = stripslashes($_REQUEST['username']);
	//$username = mysqli_real_escape_string($myConnection,$username);
	$password = stripslashes($_REQUEST['password']);
	//$password = mysqli_real_escape_string($myConnection,$password);
    $query = "SELECT * FROM users WHERE roll='$username' and pass='".md5($password)."'";
	$result = mysqli_query($myConnection,$query) or die(mysqli_error());
	$rows = mysqli_num_rows($result);
	$row = mysqli_fetch_row($result);
        if($rows >= 1){
        $_SESSION['loggedin']=true;
	    $_SESSION['roll'] = $username;
	    $_SESSION['name'] = $row[1];

	    header("location: ./GP_main.php");
         }else{
			$incorrect = "Roll.No / Password is incorrect!";
	}
}
   
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
	<title>GP Calc - Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
	<link rel="stylesheet" href="Gp_style.css">
</head>

<body >

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js" integrity="sha256-3arngJBQR3FTyeRtL3muAGFaGcL8iHsubYOqq48mBLw=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
	<script>let FirstTime=0,cur_sem;</script>
	<script>let dark;</script>
	<script defer src="./Gp_script.js"></script>



	<div class="transition-slideright"></div>
	<div class="container-fluid "id='swup' style="height: 100%">

		<img src="picture.svg" id="phone"class="transition-left" alt="">
		<div class="row cont" style="height: 100%">
			<div class="col img opt">
				<img id="con" src="wave.png" height="1187" width=800 alt="">
			</div>

			<div  class="col  main">



				<div class="m-5 img-pro transition-left"><img src="profile.svg" class="mx-auto col-12" id='profile' alt=""></div>
				<div class=" form transition-up" style="width: 100%">
					<form action="" class="mx-auto" method="POST" autocomplete="off">
						<h3 class="text-center wel-font" id="wel">Welcome</h3>
						<div class="text form-group justify-content-center mx-auto col-12">
							<input type="text" id="uname" class=" " name="username" required="">
							<label for="uname"><span class="content"><i
										class="fa fa-user"></i>&nbsp;&nbsp;Roll Number</span></label>
						</div>

						<div class="text form-group justify-content-center mx-auto col-12">
							<input type="password" id="pass" class=" " name="password" required>
							<label for="pass"><span class="content"><i
										class="fa fa-lock"></i>&nbsp;&nbsp;Password</span></label>
						</div>
						<small><?php echo $incorrect; ?></small>
						<div class="col-12 text-right form-group">
							<a href="">
								<h6><a href="./GP_forgotpass.html" class="other">Forgot Password?</a><h6>
							</a>
						</div>
						<div class="row">
							<button class="btn btn-lg col" style="font-size:19px;font-weight:bold">Login</button>
							<a class="btn btn-lg col other" href="./GP_registration.html" style="font-size:19px;font-weight:bold">Sign
								Up</a>
						<div class="message_box"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	let cgpa_val;
</script>

</html>