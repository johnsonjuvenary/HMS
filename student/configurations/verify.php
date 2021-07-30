<?php
session_start();
$regno = "";
$errors = [];
$successes = [];


if (isset($_POST['student_verify'])) {
  //checking for empty regno input
  if (empty($_POST['regno'])) {
    $errors['regno'] = 'Registration Number Required';
  } elseif (count($errors) == 0) {
    include('connection.php');
    //assigning and escaping injection
    $regno = htmlentities(mysqli_escape_string($connection, $_POST['regno']));
    //checking of reg number provided is in the database
    $regno_check = mysqli_query($connection, "SELECT regno FROM students WHERE regno ='$regno' LIMIT 1");
    if (mysqli_num_rows($regno_check) == 0) {
      $errors['regno_not_found'] = 'Registration Number You Provided is Invalid!';
    } else {
      //storing session
      $_SESSION['student'] = $regno;
      //generating random numbers/password between 100000 and 900000
      $password = rand(1000000, 9000000);
      //hashing generated password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      //checking if provided regno is already verified
      $regno_valid = mysqli_query($connection, "SELECT * FROM login WHERE regno = '$_SESSION[student]' AND active = 'yes' LIMIT 1 ");
      if (mysqli_num_rows($regno_valid) > 0) {
        $errors['regno_valid'] = 'Registration Number You Entered is verified already, please login!';
      } else {
        //inserting login details
        $sql_insert = "INSERT INTO login (regno,active,password) VALUES ('$_SESSION[student]','yes','$hashed_password')";
        $inserting_student = mysqli_query($connection, $sql_insert);

        if (!$inserting_student) {
          $errors['verification_failed'] = 'Verification failed, Try again!';
        } else {
          $successes['verified'] = 'Congratulations! Your Verified please check an email we sent you.';
          // sending email to student from an email he/she registered

          //fetching student email first
          $student_email = mysqli_query($connection, "SELECT first_name, email FROM students WHERE regno ='$_SESSION[student]'");
          if ($student_email) {
            while ($email = mysqli_fetch_array($student_email)) {
              //sending email
              $to = $email['email'];
              $subject = 'STUDENT VERIFICATION | HMS';
              $message = '
Hello ' .  ucfirst($email['first_name']) . ' 
Thanks for verification!
Your account has been created, you can login with the following credentials.

-------------------------------------------------------
Registration Number: ' . strtoupper($_SESSION['student']) . '
Password: ' . $password . '
-------------------------------------------------------

Regards
          ';
              $header = 'HOSTEL MANAGEMENT SYSTEM' . "\r\n";
              mail($to, $subject, $message, $header);
            }
          } else {
            $errors['verification_failed'] = 'Verification Failed!';
          }
        }
      }
    }
  }
}
