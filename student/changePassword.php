<?php
include('configurations/changePassword.php');
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
        <li class="nav-items">
          <a href="checkStatus.php" class="nav-link">
            <i class="fa fa-envelope mr-3" aria-hidden="true"></i> Check
            Status
          </a>
        </li>
        <li class="nav-items active">
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
        <li class="nav-items">
          <a href="checkStatus.php" class="nav-link">
            <i class="fa fa-envelope mr-3" aria-hidden="true"></i> Check
            Status
          </a>
        </li>
        <li class="nav-items active">
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
        <h5 class="card-header">Change Your Password</h5>
        <div class="card-body">
          <p class="card-text">
            <?php if (count($errors) > 0) : ?>
              <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                  <?php echo $error; ?>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <?php if (count($successes) > 0) : ?>
              <div class="alert alert-success">
                <?php foreach ($successes as $success) : ?>
                  <?php echo $success; ?>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <form action="changePassword.php" method="post">
              <div class="form-group col-md-6">
                <label for="password">Enter Your Old Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="password">Enter Your New Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="passwordConfirm">Confirm Your New Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm Password" required>
                </div>
              </div>
              <div class="form-group col-md-6">
                <input type="submit" class="btn btn-primary" name="change_password" value="Change Password" style="color:#fff;">
              </div>
            </form>
          </p>
        </div>
      </div>
    </div>
    <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>