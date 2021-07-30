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
        <li class="nav-items active">
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
        <li class="nav-items">
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
        <li class="nav-items active">
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
        <h5 class="card-header">Student Profile</h5>
        <div class="card-body">
          <p class="card-text">
            <?php
            //querying student informations
            $student_information = mysqli_query($connection, "SELECT * FROM kins,students WHERE kins.student_regno = students.regno AND students.regno = '$_SESSION[student]'");
            while ($row_student_information = mysqli_fetch_array($student_information)) {  ?>
        </div>
        <div class="table-responsive">
          <ul class="list-group">
            <!-- personal details -->
            <li class="list-group-item" style="background:#1E90FF;color:#fff;">Personal Details</li>
            <li class="list-group-item">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td class="font-weight-bold">Student Name</td>
                    <td><?php echo ucwords($row_student_information["first_name"] . ' ' . $row_student_information["middle_name"] . ' ' . $row_student_information["last_name"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Registration Number</td>
                    <td><?php echo strtoupper($row_student_information["regno"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Date Of Birth</td>
                    <td><?php echo $row_student_information["dob"]; ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Gender</td>
                    <td><?php echo ucfirst($row_student_information["gender"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Place Of Birth</td>
                    <td><?php echo ucwords($row_student_information["place_of_birth"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Nationality</td>
                    <td><?php echo ucfirst($row_student_information["nationality"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Physical Address</td>
                    <td><?php echo ucwords($row_student_information["physical_address"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Marital Status</td>
                    <td><?php echo ucfirst($row_student_information["marital_status"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Mobile Number</td>
                    <td><?php echo $row_student_information["mobile"]; ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Email Address</td>
                    <td><?php echo strtolower($row_student_information["email"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Sponsor</td>
                    <td><?php echo ucfirst($row_student_information["sponsor"]); ?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Course</td>
                    <td><?php echo ucwords($row_student_information["course"]);
                        ?></td>
                  </tr>
                </tbody>
              </table>
            </li> <!-- end of personal deatils -->
            <!-- next of kins details -->
            <li class="list-group-item" style="background:#1E90FF;color:#fff;">Next Of Kin Details</li>
            <li class="list-group-item">
              <ul class="list-group">
                <li class="list-group-item" style="background:#1E90FF;color:#fff;">First Kin</li>
                <li class="list-group-item">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td class="font-weight-bold">Name</td>
                        <td><?php echo ucwords($row_student_information["firstKin_name"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Relationship</td>
                        <td><?php echo ucfirst($row_student_information["firstKin_relationship"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Region</td>
                        <td><?php echo ucwords($row_student_information["firstKin_region"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">District</td>
                        <td><?php echo ucwords($row_student_information["firstKin_district"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Ward</td>
                        <td><?php echo ucwords($row_student_information["firstKin_ward"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Street</td>
                        <td><?php echo ucwords($row_student_information["firstKin_street"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Occupation</td>
                        <td><?php echo ucwords($row_student_information["firstKin_occupation"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Mobile Number</td>
                        <td><?php echo $row_student_information["firstKin_mobile"]; ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Email Address</td>
                        <td><?php echo strtolower($row_student_information["firstKin_email"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Postal Address</td>
                        <td><?php echo ucfirst($row_student_information["firstKin_postal_address"]);
                            ?></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li class="list-group-item" style="background:#1E90FF;color:#fff;">Second Kin</li>
                <li class="list-group-item">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td class="font-weight-bold">Name</td>
                        <td><?php echo ucwords($row_student_information["secondKin_name"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Relationship</td>
                        <td><?php echo ucfirst($row_student_information["secondKin_relationship"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Region</td>
                        <td><?php echo ucwords($row_student_information["secondKin_region"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">District</td>
                        <td><?php echo ucwords($row_student_information["secondKin_district"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Ward</td>
                        <td><?php echo ucwords($row_student_information["secondKin_ward"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Street</td>
                        <td><?php echo ucwords($row_student_information["secondKin_street"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Occupation</td>
                        <td><?php echo ucwords($row_student_information["secondKin_occupation"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Mobile Number</td>
                        <td><?php echo $row_student_information["secondKin_mobile"]; ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Email Address</td>
                        <td><?php echo strtolower($row_student_information["secondKin_email"]); ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Postal Address</td>
                        <td><?php echo ucfirst($row_student_information["secondKin_postal_address"]);
                          } ?></td>
                      </tr>
                    </tbody>
                  </table>

                </li>

              </ul>
            </li>
          </ul>
        </div>
        </p>
      </div>
    </div>
  </div>
  <!-- end of contents -->
</div>
</div>
<?php include('includes/footer.php'); ?>