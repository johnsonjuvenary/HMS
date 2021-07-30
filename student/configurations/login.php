<?php
session_start();
$regno = "";
$errors = [];


if (isset($_POST['login_student'])) {
  //checking for empty regno input
  if (empty($_POST['regno'])) {
    $errors['regno'] = 'Registration Number Required';
  }
  // checking for empty password input
  else if (empty($_POST['password'])) {
    $errors['password'] = 'Password Required';
  } elseif (count($errors) == 0) {
    include('connection.php');
    //assigning and escaping injection
    $regno = htmlentities(mysqli_escape_string($connection, $_POST['regno']));
    $password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
    $select_student = mysqli_query($connection, "SELECT * FROM login WHERE regno = '$regno' LIMIT 1");
    if (mysqli_num_rows($select_student) == 0) {
      $errors['invalid_regno'] = 'Invalid Registration Number or Password';
    } else {
      $student_login = mysqli_fetch_array($select_student);
      if (!password_verify($password, $student_login['password'])) {
        $errors['password_fail'] = 'Invalid Registration Number or Password';
      } else {
        //initializing session
        $_SESSION['student'] = $regno;
        header("Location: home.php");
      }
    }
  }
}
