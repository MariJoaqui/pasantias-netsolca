<?php

$host = "localhost";
$user = "juamed75_infiweb";
$pass = "Medus@58srx";
$db   = "juamed75_infiweb";

$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
}

?>