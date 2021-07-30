<?php
session_start();
include('connection.php');

if (isset($_GET['approve'])) {
  $regno = $_GET['approve'];
  //approving payment
  $warden = $_SESSION['warden'];
  $approve_student = mysqli_query($connection, "UPDATE applicants SET payment = 'paid', payment_approval = '$warden' WHERE student_regno = '$regno'");
}
?>
<script>
  window.location = ("../payment.php");
</script>