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
        <li class="nav-items active">
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
        <h5 class="card-header">Home</h5>
        <div class="card-body">
          <p class="card-text">
            <ol class="list-group" style="display:list-items">
              <li class="list-group-item " style="background:#1E90FF;color:#fff;">HOSTEL RULES AND REGULATIONS</li>
              <li class="list-group-item">The hostel contract duration is meant to last for <strong> ONE ACADEMIC YEAR ONLY.</strong>
              </li>
              <li class="list-group-item">Student must pay hostel fee in full before they can given room keys. Hostel fee for this
                academic year is <strong> 400,000/= </strong> and <strong>30,000/=</strong> key deposit fund, <strong> 20,000/=</strong> for hostel ID which
                makes total <strong> 450,000/= </strong> undergraduate students. For postgraduate students the fee is
                <strong>550,000/=</strong> where <strong>30,000/=</strong> for key deposit and <strong> 20,000/=</strong> for hostel ID. The key deposit
                amount is refunded after key return.</li>
              <li class="list-group-item">Student must return hostel keys
                <span class="text-danger">within five days after the end of second semester
                  examination which mark the end of academic year.</span> Failure to return keys will attract penalty
                as stipulated in IFM prospectus under student regulations part II.</li>
              <li class="list-group-item">Musical appliances which make noise and disturb others are not allowed in the hostel rooms.
                Any student should make sure that the hostel is calm for studies. Student using musical
                appliance to disturb other in the hostel shall be expelled.</li>
              <li class="list-group-item">The student is not allowed to change room without prior consultation with the Office of the
                Dean of Students..</li>
              <li class="list-group-item">Cooking in the hostels is strictly prohibited. Any kind of cooker should not be used in the
                hostels.</li>
              <li class="list-group-item">Any property other than bag items should get written permit from the Dean of Student before
                it is brought to the Institute hostels. The Institute guards will have powers to bar any students
                from bringing property of such sort to the Institute premises if they have no permit</li>
              <li class="list-group-item">Student is required to keep his/her room clean and tidy. Posting notes and poster on hostel
                room walls is not allowed.
              </li>
              <li class="list-group-item">Any repair needs must be reported to Estate Manager</li>
              <li class="list-group-item">It is an obligation of any student staying in the hostel to keep his/her hostel payment receipt
                and contract document tot end of his/her stay.
              </li>
              <li class="list-group-item">Smoking and alcohol drinking is not allowed in the rooms and round hostels. Any reported
                case of a student smoking taking alcohol drinks in and around hostels shall attract expulsion
                from the hostels</li>
              <li class="list-group-item">Every student staying in the hostel should have his/her hostel identity card when entering or
                leaving the hostel blocks. Guards shall have powers to bar any student from entering the
                hostel if he/she does not show Hostel ID.</li>
              <li class="list-group-item">Students shall not entertain visitors in their rooms. All visitors shall be entertained in public
                places.<em>(student regulation, 2013 no. 21)</em>.</li>
              <li class="list-group-item">Student shall live peacefully with one another. Where a student is found to misbehave
                towards roommates the misbehaving student shall be evicted from the room immediately.
                <em>(student regulation, 2013 no. 22)</em>
              </li>
              <li class="list-group-item">Each room shall be allocated by the appropriate authority, permitting an unauthorized
                occupant to live in a hostel room is prohibited. <em>(student regulation, 2013 no. 23)</em></li>
              <li class="list-group-item">Access to hostel room, students shall give access to the staff of the Institute to enter the
                hostel rooms for purposes of carrying out administrative duties. The staff require entry into a
                hostel room occupied by a student shall be required to: <br />
                <em>(student regulation, 2013 no. 24)
                </em>
                <ol class="list-group">
                  <li class="list-group-item">Identify himself or herself by stating his/her name and position and showing his
                    identification card.</li>
                  <li class="list-group-item">State reasons for requiring access.</li>
                </ol>
              </li>

              <li class="list-group-item">Denial access, where access into a hostel is denied and it is deemed necessary that
                immediate entry is required the staff may use any reasonable means to gain access. In such
                circumstances the staff shall required to:

                <ol class="list-group">
                  <li class="list-group-item">Be accompanied by a security officer and a student representative. For the
                    purpose of this regulation a student representative shall include a student leader
                    or, in the absence of such leader, any other student.</li>
                  <li class="list-group-item"> Make a written report of the incident and submit to the appropriate authority.
                    <em>(student regulation, 2013 no. 26)</em></li>
                </ol>
              </li>
            </ol>
          </p>
        </div>
      </div>
    </div>
    <!-- end of contents -->
  </div>
</div>
<?php include('includes/footer.php'); ?>