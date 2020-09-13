<?php

require('db.php');
include("auth.php");
$roll_no = $_SESSION['roll'];
$query = "SELECT * from users,sem1,sem2,sem3,sem4,sem5,sem6,sem7,sem8 where roll=$roll_no";
if($result = mysqli_query($myConnection,$query)){
    $row = mysqli_fetch_row($result);
    $email = $row[2];
    $new_user = $row[6];
    $reg_no = $row[0];
    $name = $row[1];
    $cgpa = $row[15];
    $cur_sem = $row[9];
    
    
}
if($cur_sem == 8)
        $cur_sem = 8;
else
    $cur_sem = $row[9]+1;

  
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
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
     <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
	<script defer src="./Gp_script.js"></script>

   <script> let FirstTime; </script>
<script> let cur_sem;</script>
<script> let cgpa_val;</script>



        </script>
	<div class="transition-slideright"></div>
	<div class="container-fluid "id='swup' style="height: 100%">

		<img src="picture.svg" id="phone"class="transition-left" alt="">
		<div class="row cont" style="height: 100%">
			<div class="col img opt">
				<img id="con" src="wave.png" height="1187" width=800 alt="">
			</div>

			

                <div class=" form transition-up row mx-auto">
					<form action="" class="mx-auto p-1" method="POST" autocomplete="off">
						<h3 class="text-center wel-font" id="wel">My Profile</h3>
                        
                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Name
                        </div>
                        <div class="col-6 text-center">
                            <?php echo $name ?>Harish
                        </div>


                    </div>

                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Roll No.
                        </div>
                        <div class="col-6 text-center">
                            <?php echo $reg_no ?>132
                        </div>


                    </div>
                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Current Sem
                        </div>
                        <div class="col-6 text-center">
                            <?php echo $cur_sem ?>3
                        </div>


                    </div>

                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            CGPA
                        </div>
                        <div class="col-6 text-center">
                            <?php echo $cgpa ?>9.42
                        </div>


                    </div>





                    
            
                        

	<!--				<table>
						
    <tbody>
      <tr>
        <th>Name</th>
        <td><?php echo $name ?>Harish</td>
        
      </tr>
      <tr>
        <th>Roll No.</th>
        <td><?php echo $reg_no ?>1818126</td>
        
      </tr>
      <tr>
        <th>Email</th>
        <td><?php echo $email ?>harishvilar91@gmail.com</td>
        
      </tr>

      <tr>
        <th>Current Sem&nbsp;&nbsp;&nbsp;</th>
        <td><?php echo $cur_sem ?>3</td>
        
      </tr>
<tr>
        <th>CGPA</th>
        <td><?php echo $cgpa ?></td>
        
      </tr>

    </tbody>
					</table>-->


<div class="row mt-5">
<a class="btn btn-lg col-8 mx-auto text-center" href="./GP_main.php" style="font-size:19px;font-weight:bold">Back</a>
</div>                    
</form>
					
			
			</div>
        </div>
    </div>
    <div  class="col justify-content-center">
    
                <!--<div class="m-5 img-pro transition-left"><img src="profile.svg" class="mx-auto col-12" id='profile' alt=""></div>-->
                <div class="row mx-auto my-4 transition-up"style="width=100%">    
                    <div class="swiper-container col-12 my-4 mx-auto">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide slide1">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">

                            <div class="col-12 text-center">
                                Sem 1
                            </div>
                            
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Chem
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>O
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Fundamentals of Electrical and Electronic Engineering
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Maths
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>O
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Enginnering Graphics.
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Fundamentals of Electrical and Electronic Engineering Laboratory
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Chem Lab
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>B+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Physics
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>B
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">

                            <div class="col-6 text-left ">
                                Your GPA
                            </div>
                            <div class="col-6 text-right ">
                                <?php echo $reg_no ?>8.78
                            </div>
    
    
                        </div>

                      </div>
                      <div class="swiper-slide slide2" >

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">

                            <div class="col-12 text-center">
                                Sem 1
                            </div>
                            
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Chem
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>O
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Fundamentals of Electrical and Electronic Engineering
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Maths
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>O
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Enginnering Graphics.
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Fundamentals of Electrical and Electronic Engineering Laboratory
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>A
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Chem Lab
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>B+
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">

                            <div class="col-6 text-left">
                                Physics
                            </div>
                            <div class="col-6 text-right">
                                <?php echo $reg_no ?>B
                            </div>
    
    
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">

                            <div class="col-6 text-left ">
                                Your GPA
                            </div>
                            <div class="col-6 text-right ">
                                <?php echo $reg_no ?>8.78
                            </div>
    
    
                        </div>


                      </div>
                      <div class="swiper-slide slide3" ></div>
                      <div class="swiper-slide slide4" ></div>
                      <div class="swiper-slide slide5" ></div>
                      <div class="swiper-slide slide6" ></div>
                      <div class="swiper-slide slide7" ></div>
                      <div class="swiper-slide slide8" ></div>
                    </div>
                    
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"style="color:#38d39f"></div>
                    <div class="swiper-button-next"style="color:#38d39f"></div>
                </div>
            </div>
	</div>

			


	



	
</body>
</body>

</html>