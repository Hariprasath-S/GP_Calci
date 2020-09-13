 <?php
require('db.php');
include("auth.php");
$roll_no = $_SESSION['roll'];
$query = "SELECT curr_sem,darkmode from users where roll='$roll_no'";
if($result = mysqli_query($myConnection,$query)){
    $row = mysqli_fetch_row($result);
    $current_sem = $row[0];
    $dark_mode = $row[1];
}
else{
    die(mysqli_error());
}

?> 
<!DOCTYPE html>
<html lang="en">

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
<script>let dark=<?php echo $dark_mode ?>;
alert(dark);
</script>
	<script defer src="./Gp_script.js"></script>


   <script> let FirstTime; </script>
<script> let cur_sem = <?php echo $current_sem ?>;</script>
<script> let cgpa_val;</script>

<script>
   

    $(".swiper-slide").hide()

     $.ajax({                                      
          url: 'profile_page.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var roll = data[0];
            var name = data[1]; 
            var cgpa = data[7];
            var cursem = data[9];
             $("#p_name").html(name); 
             $("#p_roll").html(roll); 
             $("#p_cursem").html(cursem);
             $("#p_cgpa").html(cgpa);       
          } 
        });
       $.ajax({                                      
                  url: 'fetch_sem1.php',
                  data: "",                   
                  dataType: 'json',             
                  success: function(data){
                    var eng = data[1]==0?'-':data[1];
                    var calc = data[2]==0?'-':data[2];; 
                    var c = data[3]==0?'-':data[3];;
                    var phy = data[4]==0?'-':data[4];;
                    var work = data[5]==0?'-':data[5];;
                    var phylab = data[6]==0?'-':data[6];;
                    var clab = data[7]==0?'-':data[7];;
                    var gpa1 = data[8]==0?'-':data[8];;
                     $("#eng").html(eng); 
                     $("#calc").html(calc); 
                     $("#c").html(c);
                     $("#phy").html(phy); 
                     $("#work").html(work); 
                     $("#phylab").html(phylab); 
                     $("#clab").html(clab);
                     $("#gpa1").html(gpa1);      
                  } 
                });

        $.ajax({                                      
          url: 'fetch_sem2.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var che = data[1]==0?'-':data[1];
            var math = data[2]==0?'-':data[2]; 
            var eee = data[3]==0?'-':data[3];
            var chemlab = data[4]==0?'-':data[4];
            var eeelab = data[5]==0?'-':data[5];
            var eg = data[6]==0?'-':data[6];
            var gpa2 = data[7]==0?'-':data[7];
             $("#chem").html(che); 
             $("#math").html(math);
             $("#eee").html(eee);
             $("#chemlab").html(chemlab);
             $("#eeelab").html(eeelab);
             $("#eg").html(eg);
             $("#gpa2").html(gpa2); 
                   
          } 
        });
        $.ajax({                                 
          url: 'fetch_sem3.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var ptas = data[1]==0?'-':data[1];
            var dld = data[2]==0?'-':data[2]; 
            var ece = data[3]==0?'-':data[3];
            var mpmc = data[4]==0?'-':data[4];
            var dsa = data[5]==0?'-':data[5];
            var oops = data[6]==0?'-':data[6];
            var ese = data[7]==0?'-':data[7];
            var dldlab = data[8]==0?'-':data[8];
            var dsalab = data[9]==0?'-':data[9];
            var gpa3 = data[10]==0?'-':data[10];
             $("#ptas").html(ptas); 
             $("#dld").html(dld); 
             $("#ece").html(ece); 
             $("#mpmc").html(mpmc); 
             $("#dsa").html(dsa); 
             $("#dsalab").html(dsalab); 
             $("#dldlab").html(dldlab); 
             $("#oops").html(oops); 
             $("#ese").html(ese); 
             $("#gpa3").html(gpa3);     
          } 
        });
        $.ajax({                                      
          url: 'fetch_sem4.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var rmt = data[1]==0?'-':data[1];
            var eds = data[2]==0?'-':data[2]; 
            var coa = data[3]==0?'-':data[3];
            var ddm = data[4]==0?'-':data[4];
            var ict = data[5]==0?'-':data[5];
            var os = data[6]==0?'-':data[6];
            var coi = data[7]==0?'-':data[7];
            var ddmlab = data[8]==0?'-':data[8];
            var oslab = data[9]==0?'-':data[9];
            var gpa4 = data[10]==0?'-':data[10];
             $("#rmt").html(rmt); 
             $("#eds").html(eds); 
             $("#coa").html(coa); 
             $("#ddmlab").html(ddmlab); 
             $("#os").html(os); 
             $("#oslab").html(oslab); 
             $("#ict").html(ict); 
             $("#coi").html(coi); 
             $("#gpa4").html(gpa4); 
             $("#ddm").html(ddm); 
          } 
        });
        $.ajax({                                    
          url: 'fetch_sem5.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var tech = data[1]==0?'-':data[1];
            var web = data[2]==0?'-':data[2]; 
            var dcn = data[3]==0?'-':data[3];
            var ada = data[4]==0?'-':data[4];
            var pe1 = data[5]==0?'-':data[5];
            var oe1 = data[6]==0?'-':data[6];
            var dcnlab = data[7]==0?'-':data[7];
            var weblab = data[8]==0?'-':data[8];
            var gpa5 = data[9]==0?'-':data[9];
             $("#tech").html(tech); 
             $("#web").html(web); 
             $("#dcn").html(dcn); 
             $("#ada").html(ada); 
             $("#pe1").html(pe1); 
             $("#oe1").html(oe1); 
             $("#dcnlab").html(dcnlab); 
             $("#weblab").html(weblab); 
             $("#gpa5").html(gpa5);   
          } 
        });
        $.ajax({                                   
          url: 'fetch_sem6.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var ml = data[1]==0?'-':data[1];
            var soft = data[2]==0?'-':data[2]; 
            var dsp = data[3]==0?'-':data[3];
            var pe2 = data[4]==0?'-':data[4];
            var oe2 = data[5]==0?'-':data[5];
            var oe3 = data[6]==0?'-':data[6];
            var mllab = data[7]==0?'-':data[7];
            var ostlab = data[8]==0?'-':data[8];
            var gpa6 = data[9]==0?'-':data[9];
             $("#ml").html(ml); 
             $("#soft").html(soft); 
             $("#dsp").html(dsp); 
             $("#pe2").html(pe2); 
             $("#oe2").html(oe2); 
             $("#oe3").html(oe3); 
             $("#mllab").html(mllab); 
             $("#ostlab").html(ostlab);  
             $("#gpa6").html(gpa6);   
          } 
        });
        $.ajax({                                   
          url: 'fetch_sem7.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var ethics = data[1]==0?'-':data[1];
            var cns = data[2]==0?'-':data[2]; 
            var iot = data[3]==0?'-':data[3];
            var pe3 = data[4]==0?'-':data[4];
            var pe4 = data[5]==0?'-':data[5];
            var oe4 = data[6]==0?'-':data[6];
            var iotlab = data[7]==0?'-':data[7];
            var mini = data[8]==0?'-':data[8];
            var gpa7 = data[9]==0?'-':data[9];
             $("#ethics").html(ethics); 
             $("#cns").html(cns); 
             $("#iot").html(iot); 
             $("#pe3").html(pe3); 
             $("#pe4").html(pe4); 
             $("#oe4").html(oe4); 
             $("#iotlab").html(iotlab); 
             $("#mini").html(mini); 
             $("#gpa7").html(gpa7); 
                
          } 
        });
        $.ajax({                                   
          url: 'fetch_sem8.php',
          data: "",                   
          dataType: 'json',             
          success: function(data){
            var pe5 = data[1]==0?'-':data[1];
            var pe6 = data[2]==0?'-':data[2]; 
            var proj = data[3]==0?'-':data[3];
            var gpa8 = data[4]==0?'-':data[4];
             $("#pe5").html(pe5); 
             $("#pe6").html(pe6); 
             $("#proj").html(proj); 
             $("#gpa8").html(gpa8); 
                
          } 
        });
       
        
     



</script>
<script>
      
</script>


       
	<div class="transition-slideright"></div>
	<div class="container-fluid "id='swup' style="height: 100%">

		<img src="picture.svg" id="phone"class="transition-left" alt="">
		<div class="row cont" style="height: 100%">
			<div class="col img opt">
				<img id="con" src="wave.png" height="1187" width=800 alt="">
			</div>

			

                <div class="col  transition-up mx-auto">
                    <div class="row mx-auto form">
					<form action="" class="mx-auto p-1" method="POST" autocomplete="off">
						<h3 class="text-center wel-font" id="wel">My Profile</h3>
                        
                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Name
                        </div>
                        <div class="col-6 text-center" id="p_name"></div>


                    </div>

                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Roll No.
                        </div>
                        <div class="col-6 text-center" id="p_roll">
                            
                        </div>


                    </div>
                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            Current Sem
                        </div>
                        <div class="col-6 text-center" id="p_cursem">
                           
                        </div>


                    </div>

                    <div class="row m-1 mb-2 p-3">

                        <div class="col-6 ">
                            CGPA
                        </div>
                        <div class="col-6 text-center" id="p_cgpa">
                            
                        </div>


                    </div>


<div class="row mt-5">
<a class="btn btn-lg col-8 mx-auto text-center other" href="./GP_main.php" style="font-size:19px;font-weight:bold">Back</a>
</div>                    
</form>

</div>





    
                <!--<div class="m-5 img-pro transition-left"><img src="profile.svg" class="mx-auto col-12" id='profile' alt=""></div>-->
                <div class="row mx-auto my-4 transition-up"style="width=100%">    
                    <div class="swiper-container col-12 my-4 mx-auto">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide slide1" style="postion: relative">

                        <div class="row row1 m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 1</div>
                        </div>

                        <div class="row  m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Communicative English</div>
                            <div class="col-6 text-right" id="eng"><img id="stick" src="vadivel_stick copy.png"/> 
                            </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Calculus</div>
                            <div class="col-6 text-right" id="calc"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Programming in C</div>
                            <div class="col-6 text-right" id="c"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Semiconductor Physics</div>
                            <div class="col-6 text-right" id="phy"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                                Workshop Practice
                            </div>
                            <div class="col-6 text-right" id="work"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Physics Lab</div>
                            <div class="col-6 text-right" id="phylab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Programming in C lab</div>
                            <div class="col-6 text-right" id="clab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa1"></div>
                        </div>

                      </div>
                      
                      <div class="swiper-slide slide2" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 2</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Applied Chemistry</div>
                            <div class="col-6 text-right" id="chem"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Differential Equations and Linear Algebra</div>
                            <div class="col-6 text-right" id="math"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Fundamentals of Electrical and Electronics Engineering</div>
                            <div class="col-6 text-right" id="eee"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Chemistry Laboratory
                        </div>
                            <div class="col-6 text-right" id="chemlab"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                                Enginnering Graphics
                            </div>
                            <div class="col-6 text-right" id="eg"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Fundamentals of Electrical and Electronics Engineering Laboratory</div>
                            <div class="col-6 text-right" id="eeelab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa2"></div>
                        </div>

                      </div>


                    <div class="swiper-slide slide3" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 3</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Probability Theory and Applied Statistics</div>
                            <div class="col-6 text-right" id="ptas"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Digital Logic Design</div>
                            <div class="col-6 text-right" id="dld"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Elements of communication Engineering</div>
                            <div class="col-6 text-right" id="ece"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Basics of Microprocessors and Microcontrollers</div>
                            <div class="col-6 text-right" id="mpmc"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                                Data Structures and its Appications Laboratory
                            </div>
                            <div class="col-6 text-right" id="dsalab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Data structures and its Applications</div>
                            <div class="col-6 text-right" id="dsa"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Object Oriented programming</div>
                            <div class="col-6 text-right" id="oops"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Environmental sciences and Engineering</div>
                            <div class="col-6 text-right" id="ese"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Digital logic design Laboratory</div>
                            <div class="col-6 text-right" id="dldlab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa3"></div>
                        </div>

                    </div>
                      <div class="swiper-slide slide4" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 4</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Resource Management Techniques</div>
                            <div class="col-6 text-right" id="rmt"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Elements of Discrete Structures</div>
                            <div class="col-6 text-right" id="eds"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Computer Organization and Architecture</div>
                            <div class="col-6 text-right" id="coa"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Database Design and Management</div>
                            <div class="col-6 text-right" id="ddm"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                               Operating Systems Laboratory
                            </div>
                            <div class="col-6 text-right" id="oslab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Information Coding Techniques</div>
                            <div class="col-6 text-right" id="ict"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Operating Systems</div>
                            <div class="col-6 text-right" id="os"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Consitition of India</div>
                            <div class="col-6 text-right" id="coi"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Database Design and Management Laboratory</div>
                            <div class="col-6 text-right" id="ddmlab"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa4"></div>
                        </div>

                    </div>
                      <div class="swiper-slide slide5" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 5</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Technology Management</div>
                            <div class="col-6 text-right" id="tech"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Web Technology</div>
                            <div class="col-6 text-right" id="web"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Data communication and Networking</div>
                            <div class="col-6 text-right" id="dcn"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Analysis and Design of Algorithms</div>
                            <div class="col-6 text-right" id="ada"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                               Professional Elective 1
                            </div>
                            <div class="col-6 text-right" id="pe1"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Open Elective 1
                        </div>
                            <div class="col-6 text-right" id="oe1"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Data communication and Networking Laboratory</div>
                            <div class="col-6 text-right" id="dcnlab"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Web Technology and its Application Laboratory</div>
                            <div class="col-6 text-right" id="weblab"></div>
                        </div>
                        

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa5"></div>
                        </div>

                    </div>
                      <div class="swiper-slide slide6" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 6</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Fundamentals of Machine Learning
                        </div>
                            <div class="col-6 text-right" id="ml"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Software Engineering</div>
                            <div class="col-6 text-right" id="soft"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Fundamentals of Digital Signal Processing
                            </div>
                            <div class="col-6 text-right" id="dsp"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Professional Elective 2</div>
                            <div class="col-6 text-right" id="pe2"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                               Open Elective 2
                            </div>
                            <div class="col-6 text-right" id="oe2"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Open Elective 3
                            </div>
                            <div class="col-6 text-right" id="oe3"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Machine Learning Laboratory</div>
                            <div class="col-6 text-right" id="mllab"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Open Source and Tools Laboratory</div>
                            <div class="col-6 text-right" id="ostlab"></div>
                        </div>
                        

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa6"></div>
                        </div>

                    </div>
                      <div class="swiper-slide slide7" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 7</div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" > Professional Ethics
                        </div>
                            <div class="col-6 text-right" id="ethics"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left" >Cryptography and Network Security</div>
                            <div class="col-6 text-right" id="cns"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Internet of Things and its Applications
                        </div>
                            <div class="col-6 text-right" id="iot"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Professional Elective 3
                        </div>
                            <div class="col-6 text-right" id="pe3"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                               Professional Elective 4
                            </div>
                            <div class="col-6 text-right" id="pe4"></div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Open Elective 4
                        </div>
                            <div class="col-6 text-right" id="oe4"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Internet of Things Laboratory</div>
                            <div class="col-6 text-right" id="iotlab"></div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Mini Project
                        </div>
                            <div class="col-6 text-right" id="mini"></div>
                        </div>
                        

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa7"></div>
                        </div>

                    </div>
                      <div class="swiper-slide slide8" style="postion: relative">

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem 8</div>
                        </div>
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Professional Elective 5
                            </div>
                            <div class="col-6 text-right" id="pe5"> </div>
                        </div>

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">
                               Professional Elective 6
                            </div>
                            <div class="col-6 text-right" id="pe6"></div>
                        </div>

        
                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center">
                            <div class="col-6 text-left">Project Work
                            </div>
                            <div class="col-6 text-right" id="proj"></div>
                        </div>
                        

                        <div class="row m-1 mb-2 p-3 justify-content-center align-items-center wel-font mb-5" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-6 text-left ">Your GPA</div>
                            <div class="col-6 text-right " id="gpa8"></div>
                        </div>

                    </div>
                    </div>
                    
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"style="color:#38d39f"></div>
                    <div class="swiper-button-next"style="color:#38d39f"></div>
                </div>
                </div>
    
					
			
			    </div>
            
        </div>
    </div>
    

			


	



	

</body>
</html>