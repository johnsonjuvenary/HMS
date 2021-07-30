<?php
session_start();
include('configurations/connection.php');
include('session.php');
include('includes/header.php');
?>
<!-- navbar -->
<nav class="navbar navbar-expand-md fixed-top">
  <div class="container-fluid">
    <!-- brand -->
    <a href="#hostelManagementSystem" class="navbar-brand text-capitalize">
      <div class="brand-name">
        <h3>Hostel Management System</h3>
      </div>
    </a>
    <!-- toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar links -->
    <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
      <ul class="navbar-nav links d-md-none">
        <li class="nav-items">
          <a href="home.php" class="nav-link">
            <i class="fa fa-home mr-3" aria-hidden="true"></i> Home
          </a>
        </li>
        <li class="nav-items">
          <a href="profile.php" class="nav-link">
            <i class="fa fa-user mr-3" aria-hidden="true"></i> Profile
          </a>
        </li>
        <li class="nav-items">
          <a href="apply.php" class="nav-link">
            <i class="fa fa-edit mr-3" aria-hidden="true"></i> Apply
          </a>
        </li>
        <li class="nav-items active">
          <a href="checkStatus.php" class="nav-link">
            <i class="fa fa-envelope mr-3" aria-hidden="true"></i> Check
            Status
          </a>
        </li>
        <li class="nav-items ">
          <a href="changePassword.php" class="nav-link">
            <i class="fa fa-lock mr-3" aria-hidden="true"></i> Change Password
          </a>
        </li>
      </ul>
      <!-- nav icons -->
      <ul class="navbar-nav icons">
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">
            <i class="fa fa-power-off" aria-hidden="true"></i> sign out
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- end of navbar -->
<div class="container-fluid" style="margin-top: 56px;">
  <div class="row">
    <!-- sidebar -->
    <div class="nav col-md-3 col-lg-2 d-none d-md-block sidebar right-padding max-viewport">
      <?php include('includes/profileName.php'); ?>
      <ul class="navbar-nav flex-column">
        <li class="nav-items">
          <a href="home.php" class="nav-link">
            <i class="fa fa-home mr-3" aria-hidden="true"></i> Home
          </a>
        </li>
        <li class="nav-items">
          <a href="profile.php" class="nav-link">
            <i class="fa fa-user mr-3" aria-hidden="true"></i> Profile
          </a>
        </li>
        <li class="nav-items">
          <a href="apply.php" class="nav-link">
            <i class="fa fa-edit mr-3" aria-hidden="true"></i> Apply
          </a>
        </li>
        <li class="nav-items active">
          <a href="checkStatus.php" class="nav-link">
            <i class="fa fa-envelope mr-3" aria-hidden="true"></i> Check
            Status
          </a>
        </li>
        <li class="nav-items">
          <a href="changePassword.php" class="nav-link">
            <i class="fa fa-lock mr-3" aria-hidden="true"></i> Change Password
          </a>
        </li>
      </ul>
    </div>
    <!-- end of sidebar -->
    <!-- contents -->
    <div class="col-md-9 col-lg-10 py-5 bg-light contents">
      <div class="card">
        <h5 class="card-header">Hostel Application Status</h5>
        <div class="card-body">
          <?php
          //checking application status
          $application_status = mysqli_query($connection, "SELECT selected FROM applicants WHERE student_regno = '$_SESSION[student]'");
          $result_application = mysqli_fetch_array($application_status);
          $status = $result_application["selected"];
          if (($status == 'unselected')) :
          ?>
            <div class="alert alert-info">
              <span>Selection is on Process....</span>
            </div>
          <?php elseif ($status == 'selected') : ?>
            <div class="alert alert-success">
              <span>Congratulations. You have been Approved To Join Hostel</span> <br />
              <span>Kindly, Check your Email ... <i class="fa fa-envelope text-success" aria-hidden="true"></i></span>
            </div>
          <?php else : ?>
            <div class=" alert alert-danger">
              <span>Please make an Application first!</span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>