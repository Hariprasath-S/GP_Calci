<?php
$db_host = "localhost";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = ""; 
// Place the name for the MySQL database here
$db_name = "test";

$myConnection= mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or die ("could not connect to mysql"); 
?>