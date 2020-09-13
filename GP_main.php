<?php
require('db.php');
include("auth.php");
$roll_no = $_SESSION['roll'];
$query = "SELECT * from users where roll='$roll_no'";
if($result = mysqli_query($myConnection,$query)){
    $row = mysqli_fetch_row($result);
    $reg=$row[0];
    $email = $row[2];
    $new_user = $row[6];
    $cgpa = $row[7];
    $current_sem = $row[9];
    $dark_mode = $row[11];
}
else{
    echo "ERROR";
}


//$update = "UPDATE `users` SET `last_login` = now() where roll=$roll_no";
//mysqli_query($con,$update);
// $query = "SELECT left(last_login,19) from users where roll=$roll_no";
// if($result2 = mysqli_query($myConnection,$query)){
//     $row = mysqli_fetch_row($result2);

//     if(strtotime($row[0]) == '0000-00-00 00:00:00.000000')  {
//         $last_login = now();
//     }else{
//         $last_login=$row[0];
//     }
// }
// else{die(mysql_error());}




?>
<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Calculator</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Gp_style.css">
</head>

<body id="swup">

    <!-----SCRIPTS--------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"
        integrity="sha256-3arngJBQR3FTyeRtL3muAGFaGcL8iHsubYOqq48mBLw=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


<script> let FirstTime = <?php echo $new_user ?>; </script>
<script> let cur_sem=<?php echo $current_sem ?>;</script>
<script> let cgpa_val =<?php echo $cgpa ?>;</script>
<script>let dark=<?php echo $dark_mode ?>;
//alert(dark);
</script>


<script>
    // setTimeout( function (){
    //   $.ajax({                                      
    //       url: 'newuser_fetch.php',                  
    //       data: "",                        
    //       dataType: 'json',             
    //       success: function(data)          
    //       {
    //          FirstTime = data[0];        
    //         $('#output').html("<b>user</b>"+FirstTime); 
    //       } 
    //     });
    // },2000);
</script>
    <script defer src="./Gp_script.js"></script>



    <div class="transition-slideright"></div>
    <nav class="">
        <ul>
            <li class="1" id="theme"><span></span><a href="#"><i class="fa fa-toggle-off" id="icon" style>&nbsp;</i>Dark
                    Theme</a></li>
            <li class="2"><span></span><a href="./GP_profile.php" class="other"><i
                        class="fa fa-user">&nbsp;</i>Profile</a></li>
            <li class="3"><span></span><a href="logout.php"><i class="fa fa-sign-out">&nbsp;</i>Logout</a></li>
        </ul>
    </nav>

    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>

    <div class="row w-100 mx-auto header mb-4  t">
        <div class="col-12 text-center t">
            <span id="head-text"><i class="fa fa-calculator calc"></i>&nbsp;GPA Calculator</span>
            <span id="wel_name"class="text-center " >Welcome <?php echo $_SESSION['name']; ?></span>
            <!-- <?php echo $reg.$email." ".$new_user." ".$cgpa." ".$current_sem; ?>
            <span id="output">output</span> -->


        </div>
    </div>

    <div class="main transition-up">
        <div class="row p-4 ">
            <div class="col-12 text-left pr-0 " style="font-size: large;">
                <p>Hello Genius! We present you the GPA Calculator for the IT students (under 2018 regulations) of
                    Government College of
                    Technology&comma; Coimbatore. </p>
                <p> Calculate your GPA & CGPA and save here.You can view your CGPA any time
                    in the Profile section.</p>
                <p>
                    Kindly select your current semester.<span id="prof-sec">If you want
                        to view your
                        grades, get to the <a href="./GP_profile.php" class="other btn">Profile</a> Section</span>
                </p>
            </div>
        </div>


        <div class="row p-5 justify-content-center transition-right">
            <label for="sem" class=" col m-2 col-md-3 radio">
                <h3>Sem</h3>
            </label>
            <select name="sem" class=" col col-md-3" id="sem">
                <option value="-99999" selected>--Sem--</option>
                <option value="1">I Sem</option>
                <option value="2">II Sem</option>
                <option value="3">III Sem</option>
                <option value="4">IV Sem</option>
                <option value="5">V Sem</option>
                <option value="6">VI Sem</option>
                <option value="7">VII Sem</option>
                <option value="8">VIII Sem</option>
            </select>
        </div>

        <div class="row p-4 justify-content-center cgpa-row" style="font-size: large;" >
            <div class="col-12 p-4 text-left">
                <p>In this site You will be saving your GPA of all the Semesters. Enter Your Choice.</p>
            </div>

            <form action="" class='col-12'>
                <div class="form-group col-12 row">
                    <input type="radio" name="choice" id="choice1"class="col-1 pt-3 pr-0" value="1">
                    <label for="choice1" class="col-11 pl-1 radio">I remember all the grades of my each subjects</label>
                </div>
                <div class="form-group col-12 row">
                    <input type="radio" name="choice" id='choice2'class="col-1 pt-3 pr-0" value="0">
                    <label for="choice2" class="col-11 pl-1 radio">I remember only the GPAs of my Semesters</label>
                </div>
                <!--<div class="col-12 text-center">
                    <button id="radio-select-btn" type="button" class="btn btn-lg"><i class="fa fa-check"></i>&nbsp;Submit</button>
                </div>-->
            </form>
            
            
        </div>
        
        <div class="row p-4 justify-content-center " id="gpa-rows" style="font-size: large;" >
        
            

        </div>

        

        <div class="semrow sem1">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 1</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-eng" class="col-5 mr-5 pl-0 m-0">
                            <h5>Communicative English</h5>
                        </label>
                        <select id="sem1-eng" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-cal" class="col-5 mr-5 pl-0 m-0">
                            <h5>Calculus</h5>
                        </label>
                        <select id="sem1-cal" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-c-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Programming in C Laboratory</h5>
                        </label>
                        <select id="sem1-c-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-wor-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Workshop Practice</h5>
                        </label>
                        <select id="sem1-wor-lab" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                </div>





                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-phy" class="col-5 mr-5 pl-0 m-0">
                            <h5>Semiconductor Physics</h5>
                        </label>
                        <select id="sem1-phy" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-c" class="col-5 mr-5 pl-0 m-0">
                            <h5>Programming in C</h5>
                        </label>
                        <select id="sem1-c" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem1-phy-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Physics Laboratory</h5>
                        </label>
                        <select id="sem1-phy-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------------------------------------End of SEM------------------------------------------------>
        <div class="semrow sem2">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 2</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-che" class="col-5 mr-5 pl-0 m-0">
                            <h5>Applied Chemistry</h5>
                        </label>
                        <select id="sem2-che" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-mat" class="col-5 mr-5 pl-0 m-0">
                            <h5>Differential Equations and Linear Algebra</h5>
                        </label>
                        <select id="sem2-mat" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-eee" class="col-5 mr-5    pl-0 m-0">
                            <h5>Fundamentals of Electrical and Electronics Engineering</h5>
                        </label>
                        <select id="sem2-eee" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>



                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-che-lab" class="col-5 mr-5 pl-0 m-0">
                            <h5>Chemistry Laboratory</h5>
                        </label>
                        <select id="sem2-che-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-eg" class="col-5 mr-5    pl-0 m-0">
                            <h5>Enginnering Graphics</h5>
                        </label>
                        <select id="sem2-eg" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem2-eee-lab" class="col-5 mr-5 pl-0  m-0">
                            <h5>Fundamentals of Electrical and Electronics Engineering Laboratory</h5>
                        </label>
                        <select id="sem2-eee-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem3">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 3</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-mat" class="col-5 mr-5 pl-0 m-0">
                            <h5>Probability Theory and Applied Statistics</h5>
                        </label>
                        <select id="sem3-mat" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-dld" class="col-5 mr-5 pl-0 m-0">
                            <h5>Digital Logic Design</h5>
                        </label>
                        <select id="sem3-dld" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-ece" class="col-5 mr-5    pl-0 m-0">
                            <h5>Elements of communication Engineering</h5>
                        </label>
                        <select id="sem3-ece" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-mpmc" class="col-5 mr-5  pl-0 m-0">
                            <h5>Basics of Microprocessors and Microcontrollers</h5>
                        </label>
                        <select id="sem3-mpmc" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>


                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-dsa-lab" class="col-5 mr-5  pl-0 m-0">
                            <h5>Data Structures and its Appications Laboratory</h5>
                        </label>
                        <select id="sem3-dsa-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-dsa" class="col-5 mr-5 pl-0 m-0">
                            <h5>Data structures and its Applications</h5>
                        </label>
                        <select id="sem3-dsa" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-oops" class="col-5 mr-5 pl-0 m-0">
                            <h5>Object Oriented programming</h5>
                        </label>
                        <select id="sem3-oops" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-evs" class="col-5 mr-5    pl-0 m-0">
                            <h5>Environmental sciences and Engineering</h5>
                        </label>
                        <select id="sem3-evs" class="col-4" data-credit="0">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem3-dld-lab" class="col-5 mr-5 pl-0  m-0">
                            <h5>Digital logic design Laboratory</h5>
                        </label>
                        <select id="sem3-dld-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->

        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem4">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 4</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-rmt" class="col-5 mr-5 pl-0 m-0">
                            <h5>Resource Management Techniques</h5>
                        </label>
                        <select id="sem4-rmt" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-eds" class="col-5 mr-5 pl-0 m-0">
                            <h5>Elements of Discrete Structures</h5>
                        </label>
                        <select id="sem4-eds" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-coa" class="col-5 mr-5    pl-0 m-0">
                            <h5>Computer Organization and Architecture</h5>
                        </label>
                        <select id="sem4-coa" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-dbms" class="col-5 mr-5  pl-0 m-0">
                            <h5>Database Design and Management</h5>
                        </label>
                        <select id="sem4-dbms" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>


                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-os-lab" class="col-5 mr-5  pl-0 m-0">
                            <h5>Operating Systems Laboratory</h5>
                        </label>
                        <select id="sem4-os-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-ict" class="col-5 mr-5 pl-0 m-0">
                            <h5>Information Coding Techniques</h5>
                        </label>
                        <select id="sem4-ict" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-os" class="col-5 mr-5 pl-0 m-0">
                            <h5>Operating Systems</h5>
                        </label>
                        <select id="sem4-os" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-coi" class="col-5 mr-5    pl-0 m-0">
                            <h5>Consitition of India</h5>
                        </label>
                        <select id="sem4-coi" class="col-4" data-credit="0">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem4-dbms-lab" class="col-5 mr-5 pl-0  m-0">
                            <h5>Database Design and Management Laboratory</h5>
                        </label>
                        <select id="sem4-dbms-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->

        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem5">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 5</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-tec" class="col-5 mr-5 pl-0 m-0">
                            <h5>Technology Management</h5>
                        </label>
                        <select id="sem5-tec" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-web" class="col-5 mr-5 pl-0 m-0">
                            <h5>Web Technology</h5>
                        </label>
                        <select id="sem5-web" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-dcn" class="col-5 mr-5    pl-0 m-0">
                            <h5>Data communication and Networking</h5>
                        </label>
                        <select id="sem5-dcn" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-ada" class="col-5 mr-5  pl-0 m-0">
                            <h5>Analysis and Design of Algorithms</h5>
                        </label>
                        <select id="sem5-ada" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-pe1" class="col-5 mr-5 pl-0 m-0">
                            <h5>Professional Elective 1</h5>
                        </label>
                        <select id="sem5-pe1" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-oe1" class="col-5 mr-5 pl-0 m-0">
                            <h5>Open Elective 1</h5>
                        </label>
                        <select id="sem5-oe1" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-dcn-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Data communication and Networking Laboratory</h5>
                        </label>
                        <select id="sem5-dcn-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem5-web-lab" class="col-5 mr-5 pl-0  m-0">
                            <h5>Web Technology and its Application Laboratory</h5>
                        </label>
                        <select id="sem5-web-lab" class="col-4" data-credit="2">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->


        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem6">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 6</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-ml" class="col-5 mr-5 pl-0 m-0">
                            <h5>Fundamentals of Machine Learning</h5>
                        </label>
                        <select id="sem6-ml" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-sof" class="col-5 mr-5 pl-0 m-0">
                            <h5>Software Engineering</h5>
                        </label>
                        <select id="sem6-sof" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-dsp" class="col-5 mr-5    pl-0 m-0">
                            <h5>Fundamentals of Digital Signal Processing
                            </h5>
                        </label>
                        <select id="sem6-dsp" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-pe2" class="col-5 mr-5  pl-0 m-0">
                            <h5>Professional Elective 2</h5>
                        </label>
                        <select id="sem6-pe2" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-oe2" class="col-5 mr-5 pl-0 m-0">
                            <h5>Open Elective 2</h5>
                        </label>
                        <select id="sem6-oe2" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-oe3" class="col-5 mr-5 pl-0 m-0">
                            <h5>Open Elective 3</h5>
                        </label>
                        <select id="sem6-oe3" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-ml-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Machine Learning Laboratory</h5>
                        </label>
                        <select id="sem6-ml-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem6-ops-lab" class="col-5 mr-5 pl-0  m-0">
                            <h5>Open Source and Tools Laboratory</h5>
                        </label>
                        <select id="sem6-ops-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->


        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem7">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 7</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-prof" class="col-5 mr-5 pl-0 m-0">
                            <h5>Professional Ethics</h5>
                        </label>
                        <select id="sem7-prof" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-cns" class="col-5 mr-5 pl-0 m-0">
                            <h5>Cryptography and Network Security</h5>
                        </label>
                        <select id="sem7-cns" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-iot" class="col-5 mr-5    pl-0 m-0">
                            <h5>Internet of Things and its Applications</h5>
                        </label>
                        <select id="sem7-iot" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-pe3" class="col-5 mr-5  pl-0 m-0">
                            <h5>Professional Elective 3</h5>
                        </label>
                        <select id="sem7-pe3" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-pe4" class="col-5 mr-5 pl-0 m-0">
                            <h5>Professional Elective 4</h5>
                        </label>
                        <select id="sem7-pe4" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-oe4" class="col-5 mr-5 pl-0 m-0">
                            <h5>Open Elective 4</h5>
                        </label>
                        <select id="sem7-oe4" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>



                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-iot-lab" class="col-5 mr-5    pl-0 m-0">
                            <h5>Internet of Things Laboratory</h5>
                        </label>
                        <select id="sem7-iot-lab" class="col-4" data-credit="1.5">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem7-mini" class="col-5 mr-5 pl-0  m-0">
                            <h5>Mini Project</h5>
                        </label>
                        <select id="sem7-mini" class="col-4" data-credit="4">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->


        <!--------------------------------------------End of main--------------------------------------------->
        <div class="semrow sem8">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <h3 class="text-center">Semester 8</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 p-0">
                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem8-pe5" class="col-5 mr-5 pl-0 m-0">
                            <h5>Professional Elective 5</h5>
                        </label>
                        <select id="sem8-pe5" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem8-pe6" class="col-5 mr-5 pl-0 m-0">
                            <h5>Professional Elective 6</h5>
                        </label>
                        <select id="sem8-pe6" class="col-4" data-credit="3">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>


                </div>


                <div class="col-md-4 p-0">

                    <div class="form-group mb-5 pl-3 row">
                        <label for="sem8-proj" class="col-5 mr-5 pl-0  m-0">
                            <h5>Project Work</h5>
                        </label>
                        <select id="sem8-proj" class="col-4" data-credit="8">
                            <option value="-99999">-Grade-</option>
                            <option value="10">O</option>
                            <option value="9">A+</option>
                            <option value="8">A</option>
                            <option value="7">B+</option>
                            <option value="6">B</option>
                            <option value="0">RA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------End of main--------------------------------------------->

        <div class="row justify-content-center">
            <div class="col-12 justify-content-center text-center" id="gp-submit-btn"><button class="btn m-5 p-2"
                    style="width:250px;font-size: larger;"><i class="fa fa-calculator"></i> Calculate GPA</button></div>

        </div>


        <div class="row result justify-content-center m-5">


            <div class="col-md-4 text-center mb-5">
                <h3>Sem <span id='cs'></span> GPA</h3>
                <span id="gpa" class="circle"></span>
            </div>

            <div class="col-md-4 text-center mb-5">
                <h3>CGPA</h3>
                <span id="cgpa" class="circle"></span>
            </div>
        </div>

    </div>

    <div class=" row w-100 mx-auto footer t">
        <div class="col-12 text-center p-1 p-md-3 transition-right">
            <h5>&copy; All Rights Reserved</h5>
            <h5>Designed By Harish && Hariprasath</h5>
        </div>
    </div>


    </div>
    </div>

</body>









</html>