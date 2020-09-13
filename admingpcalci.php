<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">                                                                                 
  <div class="table-responsive">
    <table class="table table-dark">
      <thead>
        <tr>
          <th>Roll</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Created</th>
          <th>LastLogin</th>
          <th>NewUser</th>
          <th>CGPA</th>
          <th>GPA</th>
          <th>Curr_Sem</th>
          <th>Unhash_pass</th>
          
        </tr>
      </thead>
      <tbody>


      	<?php 

require('db.php');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($myConnection,"SELECT * FROM users");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


        echo '<tr>
                  <td scope="row">' . $row["roll"]. '</td>
                  <td>' . $row["name"] .'</td>
                  <td> '.$row["email"] .'</td>
                  <td> '.$row["pass"] .'</td>
                  <td> '.$row["created"] .'</td>
                  <td> '.$row["last_login"] .'</td>
                  <td> '.$row["new_user"] .'</td>
                  <td> '.$row["CGPA"] .'</td>
                  <td> '.$row["GPA"] .'</td>
                  <td> '.$row["curr_sem"] .'</td>
                  <td> '.$row["unhash_pass"] .'</td>
                </tr>';

    }
} 
else {
    echo "0 results";
} 
mysqli_close($myConnection);
?>
    
      </tbody>
    </table>



  </div>
</div>

</body>
</html>
