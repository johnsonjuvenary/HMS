<?php
include('configurations/apply.php');
include('session.php');
include('includes/header.php');
?>
<!-- navbar -->
<nav class="navbar navbar-expand-md fixed-top">
  <div class="container-fluid">
    <!-- brand -->
    <a href="#" class="navbar-brand text-capitalize">
      <div class="brand-name">
        <h3>Hostel Management System</h3>
      </div>
    </a>
    <!-- toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- end of toggler -->
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
        <li class="nav-items active">
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
    <div class="nav col-md-3 col-lg-2 d-none d-md-block sidebar right-padding">
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
        <li class="nav-items active">
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
  </div>
  <!-- end of sidebar -->
  <!-- contents -->
  <div class="col-md-9 col-lg-10 py-5 bg-light contents">
    <div class="card">
      <h5 class="card-header">Apply For Hostel</h5>
      <div class="card-body">
        <?php
        //checking if a student has made application
        $checking_application = '';
        $check_application = mysqli_query($connection, "SELECT first_name,student_regno FROM applicants,students WHERE applicants.student_regno = students.regno AND student_regno = '$_SESSION[student]'");
        $row_application = mysqli_fetch_array($check_application);
        $first_name = $row_application["first_name"];
        if (mysqli_num_rows($check_application) == 1) : ?>
          <div class="alert alert-info">
            <span>
              Dear <?php echo ucfirst($first_name); ?> You have already made an application, please check your application status!
            </span>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
<h6 class="card-title font-weight-bold">
<?php else : ?>
  A: PERSONAL PARTICULARS
</h6>
<form action="apply.php" method="post" class="form-group" id="applyForm" enctype="multipart/form-data">
  <!--enctype means encrypted type that`s used to transfer file inside a server 
            multipart means convert file in encrypted later 
            form-data means convert into text with form readable format  -->
  <?php
          // Querying student details
          $query_student_details = mysqli_query($connection, "SELECT first_name,middle_name,last_name,gender,dob,place_of_birth,physical_address,nationality,marital_status,mobile,email,sponsor,course FROM students WHERE regno = '$_SESSION[student]'");
          while ($row_student_details = mysqli_fetch_array($query_student_details)) {
  ?>
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="first_name">Firstname</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo ucfirst($row_student_details["first_name"]);
                                                                                              ?>" placeholder="e.g Johnson Juvenary" disabled required />
          </div>
        </div>
        <?php if (empty($row_student_details["middle_name"])) : ?>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="last_name">Middlename</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="last_name" name="last_name" disabled />
            </div>
          </div>
        <?php else : ?>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="last_name">Middlename</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo ucfirst($row_student_details["middle_name"]);
                                                                                              ?>" placeholder="e.g Jacob" disabled required />
            </div>
          </div>
        <?php endif; ?>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="last_name">Lastname</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo ucfirst($row_student_details["last_name"]);
                                                                                            ?>" placeholder="e.g Jacob" disabled required />
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="course">Course</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="course" name="course" value="<?php echo ucwords($row_student_details["course"]);
                                                                                      ?>" placeholder="e.g Bachelor in Computer Science" disabled required />
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="regno">Registration Number</label>
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="regno" name="regno" value="<?php echo strtoupper($_SESSION['student']); ?>" placeholder=" e.g IMC/BCS/18/96208" disabled required />
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="sponsor">Sponsor</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="sponsor" name="sponsor" value="<?php echo ucfirst($row_student_details["sponsor"]);
                                                                                        ?>" placeholder="e.g Private" disabled required />
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="course">Gender</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-transgender" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo ucwords($row_student_details["gender"]);
                                                                                      ?>" placeholder="e.g Male" disabled required />
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="regno">Date of Birth</label>
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo ($row_student_details["dob"]);
                                                                                  ?>" disabled required />
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="sponsor">Marital Status</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="marital_status" name="marital_status" value="<?php echo ucfirst($row_student_details["marital_status"]);
                                                                                                      ?>" placeholder="e.g Single" disabled required />
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="course">Place Of Birth</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?php echo ucwords($row_student_details["place_of_birth"]);
                                                                                                      ?>" placeholder="e.g Bukoba Urban" disabled required />
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="regno">Physical Address</label>
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="physical_address" name="physical_address" value="<?php echo ($row_student_details["physical_address"]);
                                                                                                            ?>" disabled required />
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="sponsor">Nationality</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-flag" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo ucfirst($row_student_details["nationality"]);
                                                                                                ?>" placeholder="e.g Tanzanian" disabled required />
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="course">Email Address</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo ($row_student_details["email"]);
                                                                                    ?>" placeholder="e.g johnsonjuvenary@gmail.com" disabled required />
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <label class="form-control-label" for="regno">Mobile Number</label>
          <div class="input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo ($row_student_details["mobile"]);
                                                                                      } ?>" disabled required />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-control-label" for="disability">Do you have any physical disability, or any special
        health
        problem?</label>
      <span style="color:#FF0000;">*</span>
      Yes
      <input class="form-check-inline" type="checkbox" name="disability" id="disability" value="Yes" />

      No
      <input class="form-check-inline" type="checkbox" name="disability" id="disability" value="No" />
    </div>
    <div class="form-group">
      <label class="form-control-label" for="file_disability">If <strong>"YES"</strong> please explain and
        attach proof…
      </label>
      <textarea class="form-control" name="explanation_disability" id="explanation_disability" value="<?php echo $explanation_disability;  ?>" cols="20" rows="5" placeholder="explanation if you have any physical disability, or any special health problem..."></textarea>
      <br />
      <div class="input-group">
        <div class="custom-file col-md-6">
          <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="file_disability" id="file_disability" />
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="file_insurance">Do you have a Valid Health Insurance
        Card?</label>
      <span style="color:#FF0000;">*</span>
      <input class="form-check-inline" type="checkbox" name="insurance" id="insurance" value="Yes" />
      Yes
      <input class="form-check-inline" type="checkbox" name="insurance" id="insurance" value="No" />
      No
    </div>
    <div class="form-group">
      <label for="" class="form-control-label">If <strong>“YES” </strong> provide evidence by attaching a
        copy of Valid Health Insurance Card or if
        <strong>“NO”</strong> attach a copy of payment receipt for
        NHIF as a proof.</label>
      <span style="color:#FF0000;">*</span>
      <div class="input-group">
        <div class="custom-file col-md-6">
          <input type="file" class="custom-file-input" id="file_insurance" aria-describedby="inputGroupFileAddon01" name="file_insurance" required />
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
    </div>
    <br />
    <h6 class="card-title font-weight-bold">
      B: NEXT OF KIN IN CASE OF EMERGENCE
      (Parent/Guardian/Husband/Wife)
    </h6>
    <?php
          //querying kins details
          $query_kin = mysqli_query($connection, "SELECT * FROM kins,students WHERE kins.student_regno = students.regno AND students.regno = '$_SESSION[student]'");
          while ($query_kin_details = mysqli_fetch_array($query_kin)) {
    ?>
      <p class="card-text font-italic">FIRST NEXT OF KIN</p>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4 col-sm-12">
            <label for="firstKinName" class="form-control-label">Name</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_name" value="<?php echo ucwords($query_kin_details["firstKin_name"]);
                                                                                  ?>" placeholder="e.g Juvenary Jacob" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="firstKin_relationship" class="form-control-label">Relationship</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-handshake" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_relationship" value="<?php echo ucwords($query_kin_details["firstKin_relationship"]);
                                                                                          ?>" placeholder="e.g Father" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="" class="form-control-label">Occupation</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_occupation" value="<?php echo ucwords($query_kin_details["firstKin_occupation"]);
                                                                                        ?>" placeholder="e.g Peasant" disabled required />
            </div>
          </div>
        </div>
      </div>
      <p class="card-text">AREA OF DOMICILE</p>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-3 col-sm-12">
            <label for="firstKin_region" class="form-control-label">Region</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_region" value="<?php echo ucwords($query_kin_details["firstKin_region"]);
                                                                                    ?>" placeholder="e.g.Kagera" disabled required>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="firstKin_district" class="form-control-label">District</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_district" value="<?php echo ucwords($query_kin_details["firstKin_district"]);
                                                                                      ?>" id="firstKin_district" disabled required>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="firstKinWard" class="form-control-label">Ward</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_ward" value="<?php echo ucwords($query_kin_details["firstKin_ward"]);
                                                                                  ?>" placeholder="e.g Hamugembe" disabled required />
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="firstKinStreet" class="form-control-label">Village/Street</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="firstKin_street" value="<?php echo ucwords($query_kin_details["firstKin_street"]);
                                                                                    ?>" placeholder="e.g Kashabo" disabled required />
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="card-text">Contacts</p>
        <div class="form-row">
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="postalAddress">Postal Address</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="firstKin_postal_address" name="firstKin_postal_address" value="<?php echo ucwords($query_kin_details["firstKin_postal_address"]);
                                                                                                                          ?>" disabled />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="firstKin_mobile">Phone Number</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="firstKin_mobile" name="firstKin_mobile" value="<?php echo $query_kin_details["firstKin_mobile"];
                                                                                                          ?>" placeholder="e.g 0769335532" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="firstKin_email">Email Address</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="firstKin_email" name="firstKin_email" value="<?php echo $query_kin_details["firstKin_email"];
                                                                                                        ?>" disabled required />
            </div>
          </div>
        </div>
      </div>
      <p class="card-text font-italic">SECOND NEXT OF KIN</p>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4 col-sm-12">
            <label for="secondKin_name" class="form-control-label">Name</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_name" value="<?php echo ucwords($query_kin_details["secondKin_name"]);
                                                                                    ?>" placeholder="e.g Juvenary Jacob" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="secondKin_relationship" class="form-control-label">Relationship</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-handshake" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_relationship" value="<?php echo ucwords($query_kin_details["secondKin_relationship"]);
                                                                                            ?>" placeholder="e.g Father" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label for="" class="form-control-label">Occupation</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_occupation" value="<?php echo ucwords($query_kin_details["secondKin_occupation"]);
                                                                                          ?>" placeholder="e.g Peasant" disabled required />
            </div>
          </div>
        </div>
      </div>
      <p class="card-text">AREA OF DOMICILE</p>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-3 col-sm-12">
            <label for="secondKin_region" class="form-control-label">Region</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_region" value="<?php echo ucwords($query_kin_details["secondKin_region"]);
                                                                                      ?>" placeholder="e.g.Kagera" disabled required>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="firstKin_district" class="form-control-label">District</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_district" value="<?php echo ucwords($query_kin_details["secondKin_district"]);
                                                                                        ?>" id="firstKin_district" disabled required>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="firstKinWard" class="form-control-label">Ward</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_ward" value="<?php echo ucwords($query_kin_details["secondKin_ward"]);
                                                                                    ?>" placeholder="e.g Hamugembe" disabled required />
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <label for="secondKinStreet" class="form-control-label">Village/Street</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" name="secondKin_street" value="<?php echo ucwords($query_kin_details["secondKin_street"]);
                                                                                      ?>" placeholder="e.g Kashabo" disabled required />
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <p class="card-text">Contacts</p>
        <div class="form-row">
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="postalAddress">Postal Address</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              </div>

              <input type="text" class="form-control" id="secondKin_postal_address" name="secondKin_postal_address" value="<?php echo ucwords($query_kin_details["secondKin_postal_address"]);
                                                                                                                            ?>" disabled />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="secondKin_mobile">Phone Number</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="secondKin_mobile" name="secondKin_mobile" value="<?php echo $query_kin_details["secondKin_mobile"];
                                                                                                            ?>" placeholder="e.g 0769335532" disabled required />
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <label class="form-control-label" for="secondKin_email">Email Address</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="secondKin_email" name="secondKin_email" value="<?php echo $query_kin_details["secondKin_email"];
                                                                                                        } ?>" disabled required />
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="form-check-label">
          <label>Declaration </label><span style="color:#FF0000;"> * </span> <br />
          <input type="checkbox" name="declaration" value="Yes" required> I <?php
                                                                            $query_student_name_declaration = mysqli_query($connection, "SELECT first_name,middle_name,last_name  FROM students WHERE regno = '$_SESSION[student]'");
                                                                            while ($row_student_name_declaration = mysqli_fetch_array($query_student_name_declaration)) { ?>
            <span class="font-weight-bold text-decoration-underline"> <?php
                                                                              echo ucwords($row_student_name_declaration["first_name"] . ' ' .  $row_student_name_declaration["middle_name"] . ' ' . $row_student_name_declaration["last_name"]);
                                                                            } ?>
            </span>
            </span> a student of the Institute of Finance Management declares that I have read the <a href="home.php" class="text-decoration-none" style="color:#1E90FF;"> HOSTEL RULES </a> &amp; <a href="home.php" class="text-decoration-none" style="color:#1E90FF;">REGULATIONS</a> and I will abide to them.
        </label>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block btn-lg" name="hostel_application" value="Apply" />
      </div>
</form>
</div>
</div>
</div>

<!-- end of contents -->
</div>
</div>
<!-- end of contents -->
</div>
</div>
<?php include('includes/footer.php'); ?>
<?php endif; ?>