<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="Gp_style.css">
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div>
  <h3>View Users</h3>
  <a class="btn btn-lg col-8 mx-auto text-center other" href="./admingpcalci.php" style="font-size:19px;font-weight:bold">View</a>
  <h3>Truncate user</h3>
  <input type="text" id="uname" class=" " name="roll" required="">
  <button id="truncate" class="btn btn-lg col-8 mx-auto text-center" style="font-size:19px;font-weight:bold">Truncate</button>
</div>

</body>
<script>
  
  
  $("#truncate").click(function (e){
    e.preventDefault();
    var roll=$("#uname").val();
    if($("#uname").val() == ""){
      alert("Empty");
    }
    else{
    $.ajax({        
          type: 'post',                              
          url: 'truncate.php', 
          data: 'roll='+roll,                                    
          success: function(data)          
          {
            alert("Truncated SuccessFully");
          } 
    });
  }
});
</script>
</html>
