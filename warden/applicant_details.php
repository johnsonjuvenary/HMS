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
        <h5 class="card-header">Applicant`s Details</h5>
        <div class="card-body">
          <h6 class="card-title"></h6>
          <p class="card-text">
            <?php
            if (isset($_GET['view'])) :
              $regno = $_GET['view'];
              //checking applicant`s details
              $applicant_details = mysqli_query($connection, "SELECT * FROM applicants,students,kins wHERE students.regno = applicants.student_regno AND kins.student_regno = students.regno AND students.regno = '$regno'");
              if (mysqli_num_rows($applicant_details) > 0) :
                while ($result_applicant_details = mysqli_fetch_array($applicant_details)) :
                  // check if is selected
                  $check_selected = $result_applicant_details["selected"];
                  if ($check_selected == 'selected') : ?>
                    <div class="alert alert-success">
                      <span>Selected Already</span>
                    </div>
                  <?php endif; ?>
                  <div class="table-responsive" id="applicant-tables">
                    <table class="table table-bordered">
                      <tbody>
                        <h5>Personal Details</h5>
                        <tr style="background: #f0f0f0;">
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                        </tr>
                        <tr>
                          <td><?php echo ucfirst($result_applicant_details["first_name"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["middle_name"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["last_name"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Course</th>
                          <th>Reg#</th>
                          <th>Sponsor</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["course"]); ?></td>
                          <td><?php $regno = $result_applicant_details["regno"];
                              echo strtoupper($regno);
                              ?></td>
                          <td><?php echo ucfirst($result_applicant_details["sponsor"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Gender</th>
                          <th>Date Of Birth</th>
                          <th>Marital Status</th>
                          <th>Place Of Birth</th>
                          <th>Physical Address</th>
                          <th>Nationality</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["gender"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["dob"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["marital_status"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["place_of_birth"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["physical_address"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["nationality"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Phone Number</th>
                          <th>Email Address</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["mobile"]); ?></td>
                          <td class="text-italic"><?php echo strtolower($result_applicant_details["email"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <br>
                        <h5>Health &amp; Insurance</h5>
                        <tr style="background: #f0f0f0;">
                          <th>Any Disability</th>
                          <th>Explanation</th>
                          <th>Proof</th>
                        </tr>
                        <tr>
                          <td><?php echo ucfirst($result_applicant_details["disability_status"]); ?></td>
                          <td><?php echo ($result_applicant_details["explanation_disability"]); ?></td>
                          <?php
                          $disability_status = $result_applicant_details["disability_status"];
                          if ($disability_status == 'Yes') : ?>
                            <td><?php
                                $disability_proof =  $result_applicant_details["disability_proof"];
                                echo "<a href ='../uploads/disability/$disability_proof' target='_blank'>View</a>";
                                ?></td>

                          <?php else : ?>
                            <td><?php echo ($result_applicant_details["disability_proof"]); ?></td>
                          <?php endif; ?>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Do You Have Insurance</th>
                          <th>Insurance Proof</th>
                        </tr>
                        <tr>
                          <td><?php echo ucfirst($result_applicant_details["insurance_status"]); ?></td>
                          <td><?php
                              $insurance_proof =  $result_applicant_details["insurance_proof"];
                              echo "<a href ='../uploads/insurance/$insurance_proof' target='_blank'>View</a>";
                              ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <br>
                        <h5>Next Of Kins Details</h5>
                        <br>
                        <h5>FirstKin</h5>
                        <tr style="background: #f0f0f0;">
                          <th>Name</th>
                          <th>Relationship</th>
                          <th>Occupation</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["firstKin_name"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_relationship"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_occupation"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Region</th>
                          <th>District</th>
                          <th>Ward</th>
                          <th>Street</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["firstKin_region"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_district"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_ward"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_street"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Phone Number</th>
                          <th>Email Address</th>
                          <th>Postal Address</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["firstKin_mobile"]); ?></td>
                          <td><?php echo strtolower($result_applicant_details["firstKin_email"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["firstKin_postal_address"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <h5>SecondKin</h5>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Name</th>
                          <th>Relationship</th>
                          <th>Occupation</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["secondKin_name"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_relationship"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_occupation"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Region</th>
                          <th>District</th>
                          <th>Ward</th>
                          <th>Street</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["secondKin_region"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_district"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_ward"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_street"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="background: #f0f0f0;">
                          <th>Phone Number</th>
                          <th>Email Address</th>
                          <th>Postal Address</th>
                        </tr>
                        <tr>
                          <td><?php echo ucwords($result_applicant_details["secondKin_mobile"]); ?></td>
                          <td><?php echo strtolower($result_applicant_details["secondKin_email"]); ?></td>
                          <td><?php echo ucfirst($result_applicant_details["secondKin_postal_address"]); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-info" onclick="window.location.href='applications.php';"> <span><i class="fa fa-backward" aria-hidden="true"></i></span> Back</button>
                    <?php if ($check_selected == 'unselected') : ?>
                      <button type="button" class="btn btn-primary" onclick="window.location.href='configurations/approve_student.php?approve=<?php echo $regno; ?>';"> <span><i class="fa fa-check" aria-hidden="true"></i></span> Approve</button>
                    <?php else : ?>
                      <button type="button" class="btn btn-danger" onclick="window.location.href='configurations/disapprove_student.php?disapprove=<?php echo $regno; ?>';"> <span><i class="fa fa-times" aria-hidden="true"></i></span> Disapprove</button>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
    <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>