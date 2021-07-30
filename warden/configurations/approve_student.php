<?php
session_start();
include('connection.php');

if (isset($_GET['approve'])) {
  $regno = $_GET['approve'];
  //pulling data of approved student
  $approved_student = mysqli_query($connection, "SELECT first_name,gender,email FROM  students WHERE regno = '$regno'");
  $result_approved_student = mysqli_fetch_array($approved_student);
  $email = $result_approved_student["email"];
  $first_name = $result_approved_student["first_name"];
  //sending email to approved student
  $to = $email;
  $subject = 'STUDENT APPROVAL | HMS';
  $message = '
Congratulation  ' . ucwords($first_name) . ' ,
You have been selected join Hostel, Therefore You`re required to proceeds with payment in 5 working days from now.
IFM bank account number 01J1042984102 at the CRDB Bank, PPF
Tower Branch, Dar-Es-Salaam. 

Regards
          ';
  $header = 'HOSTEL MANAGEMENT SYSTEM' . "\r\n";
  mail($to, $subject, $message, $header);
  //approving/ selecting applicant
  $warden = $_SESSION['warden'];
  $approve_student = mysqli_query($connection, "UPDATE applicants SET selected = 'selected', hostel_approval = '$warden' WHERE student_regno = '$regno'");
}
?>
<script>
  window.location = ("../applications.php");
</script>