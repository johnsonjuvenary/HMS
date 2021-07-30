<?php
session_start();
$name = '';
$password = '';
$errors = [];

if (isset($_POST['login_warden'])) {
  //checking for empty fields
  if (empty($_POST['name']) || empty($_POST['password'])) {
    $errors['empty'] = 'Empty Name of Password';
  } elseif (count($errors) == 0) {
    include('connection.php');
    //assigning variables and escapping injection
    $name = htmlentities(mysqli_escape_string($connection, $_POST['name']));
    $password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
    //logging in warden
    $select_warden = mysqli_query($connection, "SELECT * FROM warden WHERE name = '$name' AND  password = '$password' LIMIT 1");
    if (mysqli_num_rows($select_warden) == 0) {
      $errors['invalid'] = 'Invalid Name or Password';
    } else {
      //storing session
      $_SESSION['warden'] = $name;
      header("Location: applications.php");
    }
  }
}
