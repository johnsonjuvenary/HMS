<?php
session_start();
include('connection.php');
$errors = [];
$successes = [];

if (isset($_POST['change_password'])) {
  //assigning variables and escaping injection
  $old_password = htmlentities(mysqli_escape_string($connection, $_POST['old_password']));
  $new_password = htmlentities(mysqli_escape_string($connection, $_POST['new_password']));
  $confirm_new_password = htmlentities(mysqli_escape_string($connection, $_POST['confirm_new_password']));

  if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) {
    $errors['empty-fields'] = "Empty Fields!";
  } elseif ($new_password !== $confirm_new_password) {
    $errors['password-match'] = "New Password do not match!";
  } else {
    //checking if an old password exists in the database
    $password_check = mysqli_query($connection, "SELECT * FROM login WHERE regno = '$_SESSION[student]'");
    if ($password_check) {
      $password_match = mysqli_fetch_array($password_check);
      if (!password_verify($old_password, $password_match['password'])) {
        $errors['password-match-failed'] = "Your Old password is wrong, Try again!";
      } else {
        //updating password
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT); //hashing password
        $update_password = mysqli_query($connection, "UPDATE login SET password = '$hashed_new_password' WHERE regno = '$_SESSION[student]'");
        if (!$update_password) {
          $errors['failed'] = "Changing Password Failed, Try again!";
        } else {
          $successes['changed'] = "Congratulations,Changing Password Successful!";
        }
      }
    }
  }
}
