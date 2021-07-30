<?php
include('connection.php');
$errors = [];
$successes = [];
$regno = '';
$email = '';

if (isset($_POST['password_reset'])) {
	//assigning variables and escaping injections
	$regno = htmlentities(mysqli_escape_string($connection, $_POST['regno']));
	$email = htmlentities(mysqli_escape_string($connection, $_POST['email']));

	//checking for empty inputs
	if (empty($regno) || empty($email)) {
		$errors['empty-fields'] = 'Empty Fields, Try again!';
	}
	//checking for an email if is correct
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email-error'] = 'Invalid Email Address!';
	}
	//checking if regno and email are available in the database
	else {
		$regno_check_query =  "SELECT regno,email,first_name FROM students WHERE regno = '$regno' AND email = '$email' LIMIT 1";
		$regno_check = mysqli_query($connection, $regno_check_query);
		if (mysqli_num_rows($regno_check) == 0) {
			$errors['invalid_details'] = 'Invalid Regist ration Number or Email Address!';
		} else {
			//generating new password
			$password = rand(1000000, 9000000);
			//hashing generated password
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			//updating new password
			$new_password = "UPDATE login SET password = '$hashed_password' WHERE regno = '$regno'";
			$new_password_insert = mysqli_query($connection, $new_password);
			if (!$new_password_insert) {
				$errors['failed'] = 'Failed to Recover Your password Please try again';
			} else {
				//returning data to send an email
				$row_regno_check = mysqli_fetch_array($regno_check);
				//sending an email
				$to = $row_regno_check['email'];
				$subject = 'PASSWORD RECOVERY | HMS';
				$message = '
Hello ' . ucfirst($row_regno_check["first_name"]) . ' 
Your Password has been recovered, here is your new password.
---------------------------------------------------------
Registration Number: ' . strtoupper($row_regno_check["regno"]) . '
New Password: ' . $password . '
---------------------------------------------------------

Regards.
				';
				$header = 'HOSTEL MANAGEMENT SYSTEM' . "\r\n";
				$send_email = mail($to, $subject, $message, $header);
				if (!$send_email) {
					$errors['failed-send'] = 'Failed to Recover Your password Please try again';
				} else {
					$successes['password_recovered'] = 'Congratulation! Your Password has been recovered successful,Please check an Email we sent you!';
				}
			}
		}
	}
}
