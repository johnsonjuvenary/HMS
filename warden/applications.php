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
        <li class="nav-items active">
          <a href="applications.php" class="nav-link">
            <i class="fa fa-folder mr-3" aria-hidden="true"></i> Applications
          </a>
        </li>
        <li class="nav-items">
          <a href="selected_students.php" class="nav-link">
            <i class="fa fa-book mr-3" aria-hidden="true"></i> Selected Students
          </a>
        </li>
        <li class="nav-items">
          <a href="payment.php" class="nav-link">
            <i class="fa fa-credit-card mr-3" aria-hidden="true"></i> Payments
          </a>
        </li>
        <li class="nav-items">
          <a href="addRooms.php" class="nav-link">
            <i class="fa fa-plus-square mr-3" aria-hidden="true"></i> Add Rooms
          </a>
        </li>
        <li class="nav-items">
          <a href="roomAllocation.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Room Allocation
          </a>
        </li>
        <li class="nav-items">
          <a href="hostelers.php" class="nav-link">
            <i class="fa fa-file mr-3" aria-hidden="true"></i> Hostelers
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
        <li class="nav-items active">
          <a href="applications.php" class="nav-link">
            <i class="fa fa-folder mr-3" aria-hidden="true"></i> Applications
          </a>
        </li>
        <li class="nav-items">
          <a href="selected_students.php" class="nav-link">
            <i class="fa fa-book mr-3" aria-hidden="true"></i> Selected Students
          </a>
        </li>
        <li class="nav-items">
          <a href="payment.php" class="nav-link">
            <i class="fa fa-credit-card mr-3" aria-hidden="true"></i> Payments
          </a>
        </li>
        <li class="nav-items">
          <a href="addRooms.php" class="nav-link">
            <i class="fa fa-plus-square mr-3" aria-hidden="true"></i> Add Rooms
          </a>
        </li>
        <li class="nav-items">
          <a href="roomAllocation.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Room Allocation
          </a>
        </li>
        <li class="nav-items">
          <a href="hostelers.php" class="nav-link">
            <i class="fa fa-file mr-3" aria-hidden="true"></i> Hostelers
          </a>
        </li>
      </ul>
    </div>
    <!-- end of sidebar -->
    <!-- contents -->
    <div class="col-md-9 col-lg-10 py-5 bg-light contents">
      <div class="card">
        <h5 class="card-header">Applications</h5>
        <div class="card-body">
          <h6 class="card-title"></h6>
          <p class="card-text">
            <div class="row">
              <div class="col-2">
                <div class="list-group" id="list-tab" role="tablist">
                  <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Female <span><i class="fa fa-female" aria-hidden="true"></i></span></a>
                  <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Male <span><i class="fa fa-male" aria-hidden="true"></i></span></a>
                </div>
              </div>
              <div class="col-10">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <?php include 'applications/femaleApplications.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <?php include 'applications/maleApplications.php'; ?>
                  </div>
                </div>
              </div>
            </div>


          </p>
        </div>
      </div>
    </div>
    <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>