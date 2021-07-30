<?php
session_start();
include('configurations/connection.php');
include('session.php');
include('includes/header.php');
$errors = [];
$successes = [];
$search_student = "";
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
          <a href="applications.php" class="nav-link">
            <i class="fa fa-folder mr-3" aria-hidden="true"></i> Applications
          </a>
        </li>
        <li class="nav-items">
          <a href="selected_students.php" class="nav-link">
            <i class="fa fa-book mr-3" aria-hidden="true"></i> Selected Students
          </a>
        </li>
        <li class="nav-items active">
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
        <li class="nav-items">
          <a href="applications.php" class="nav-link">
            <i class="fa fa-folder mr-3" aria-hidden="true"></i> Applications
          </a>
        </li>
        <li class="nav-items">
          <a href="selected_students.php" class="nav-link">
            <i class="fa fa-book mr-3" aria-hidden="true"></i> Selected Students
          </a>
        </li>
        <li class="nav-items active">
          <a href="payment.php" class="nav-link">
            <i class="fa fa-credit-card mr-3" aria-hidden="true"></i> Payments
          </a>
        </li>
        <li class="nav-items">
          <a href="addRooms.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Add Rooms
          </a>
        </li>
        <li class="nav-items">
          <a href="roomAllocation.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Room Allocation
          </a>
        </li>
        <li class="nav-items">
          <a href="hostelers.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Hostelers
          </a>
        </li>
      </ul>
    </div>
    <!-- end of sidebar -->
    <!-- contents -->
    <div class="col-md-9 col-lg-10 py-5 bg-light contents">
      <div class="card">
        <h5 class="card-header">Payments</h5>
        <div class="card-body">
          <h6 class="card-title"></h6>
          <p class="card-text">
            <form action="payment.php" method="POST" action="payment.php" id="search-payment">
              <div class="form-group">
                <div class="input-group">
                  <input id="input-search" type="search" name="search_student" id="search_student" class="form-control col-sm-3" placeholder="Enter Registration Number" autocomplete="off" value="<?php echo $search_student; ?>" style="padding:6px;">
                  <div class="input-group-prepend">
                    <button type="submit" class="bnt btn-primary" name="search" lass="input-group-text" id="basic-addon1" style="cursor: pointer;"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
              <?php
              if (isset($_POST['search'])) {
                $search_student = htmlentities(mysqli_escape_string($connection, $_POST['search_student']));
                if (empty($search_student)) {
                  $errors['invalid-number'] = 'Invalid Registration Number';
                } else {
                  $check_search = mysqli_query($connection, "SELECT * FROM applicants,students WHERE selected = 'selected' AND students.regno = applicants.student_regno AND student_regno ='$search_student'");
                  if ($row_check_search = mysqli_num_rows($check_search) == 0) {
                    $errors['numbers-not-found'] = 'Invalid Registration Number';
                  } else {
                    $successes['found'] = 'Registration Number Match';
                    while ($result_check_result = mysqli_fetch_array($check_search)) :
                      $first_name = $result_check_result["first_name"];
                      $middle_name = $result_check_result["middle_name"];
                      $last_name = $result_check_result["last_name"];
                      $student_name = $first_name . ' ' . $middle_name . ' ' . $last_name;
                      $regno = $search_student;
                      ?>
                      <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                          <thead class="btn-primary">
                            <tr>
                              <th>Student Reg#</th>
                              <th>Student Name </th>
                              <th>Selection Status</th>
                              <th>Payment Status</th>
                              <?php $payment_status = $result_check_result["payment"];
                                      if ($payment_status == 'unpaid') : ?>
                                <th>Approve Payment</th>
                            </tr>
                          </thead>
                        <?php else : ?>
                          </tr>
                          </thead>
                        <?php endif; ?>
                        <tr>
                          <tbody>
                            <td class='text-success'> <span><?php echo strtoupper($result_check_result["student_regno"]); ?></td>
                            <td><?php echo ucwords($student_name);  ?></td>
                            <td class='text-success'> <span><?php echo ucfirst($result_check_result["selected"]); ?></td>
                            <?php if ($payment_status == 'unpaid') : ?>
                              <td class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i></span> <?php echo  $payment_status; ?> </td>
                              <td><button type="button" class="btn btn-primary" onclick="window.location.href='configurations/approve_payment.php?approve=<?php echo $regno; ?>';"> <span><i class="fa fa-check" aria-hidden="true"></i></span> Approve</button></td>
                            <?php else : ?>
                              <td class="text-success"><span><i class="fa fa-success" aria-hidden="true"></i></span><?php echo  ucfirst($payment_status); ?> </td>
                            <?php endif; ?>
                        </tr>
                        </tbody>
                        </table>
                      </div>
              <?php
                    endwhile;
                  }
                }
              }
              ?>
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
            </form>
            <br />
            <?php
            //selecting only selected students
            $select_paid_students = mysqli_query($connection, "SELECT * FROM applicants,students WHERE students.regno = applicants.student_regno AND payment = 'paid' ORDER BY gender");
            if (mysqli_num_rows($select_paid_students) == 0) : ?>
              <div class="alert alert-info">
                <span>None... </span>
              </div>
            <?php else :
              //counting numbers of who paid already
              $male_paid = mysqli_num_rows(mysqli_query($connection, "SELECT gender FROM applicants,students WHERE students.regno = applicants.student_regno AND payment='paid' AND gender = 'male'"));
              $female_paid = mysqli_num_rows(mysqli_query($connection, "SELECT gender FROM applicants,students WHERE students.regno = applicants.student_regno AND payment='paid' AND gender = 'female'"));
              $total_paid = $male_paid + $female_paid;
              ?>
              <div class="table-responsive">
                <table class="table table-bordered" style="width:40%;">
                  <tr class="btn-primary">
                    <th>Male Paid <span><i class="fa fa-male" aria-hidden="true"></i></span></th>
                    <th>Female Paid <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
                    <th>Total <span><i class="fa fa-male" aria-hidden="true"></i></span>
                      <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
                  </tr>
                  <tr style="text-align:center;">
                    <td><?php echo $male_paid; ?></td>
                    <td><?php echo $female_paid; ?></td>
                    <td><?php echo $total_paid; ?></td>
                  </tr>
                </table>
                <table class="table table-hover table-bordered" id="table">
                  <thead class="btn-primary">
                    <tr>
                      <th>Student Name</th>
                      <th>Student Reg#</th>
                      <th>Gender</th>
                      <th>Physical Address</th>
                      <th>Disability Status</th>
                      <th>Payment Status</th>
                      <th>Payment Approved By</th>
                    </tr>
                  </thead>
                  <?php while ($result_select_paid_students = mysqli_fetch_array($select_paid_students)) :
                      $first_name = $result_select_paid_students["first_name"];
                      $middle_name = $result_select_paid_students["middle_name"];
                      $last_name = $result_select_paid_students["last_name"];
                      $student_name = $first_name . ' ' . $middle_name . ' ' . $last_name; ?>
                    <tbody>
                      <tr>
                        <td><span><?php echo ucwords($student_name); ?></td>
                        <td><?php echo strtoupper($result_select_paid_students["student_regno"]); ?></td>
                        <td><?php echo ucfirst($result_select_paid_students["gender"]);  ?></td>
                        <td><?php echo ucfirst($result_select_paid_students["physical_address"]); ?></td>
                        <td><?php echo ucfirst($result_select_paid_students["disability_status"]); ?></td>
                        <td class="text-success"><?php echo ucfirst($result_select_paid_students["payment"]); ?></td>
                        <td><?php echo ucfirst($result_select_paid_students["payment_approval"]); ?></td>
                      </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>

              </div>



            <?php endif; ?>
          </p>
        </div>
      </div>
    </div> <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>