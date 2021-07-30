<?php

$servername = 'localhost'; //localhost
$username = 'root'; //username of phpmyadmin
$password = ''; //password of phpmyadmin
$dbname = 'hms'; //database name

//connection string
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Checking connection 
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

