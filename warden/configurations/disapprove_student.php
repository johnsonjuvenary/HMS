<?php
include('connection.php');

if (isset($_GET['disapprove'])) {

  $regno = $_GET['disapprove'];
  //disapproving/ unselecting applicant
  $approve_student = mysqli_query($connection, "UPDATE applicants SET selected = 'unselected's WHERE student_regno = '$regno'");
}
?>
<script>
  window.location = ("../applications.php");
</script>