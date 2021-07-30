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
        <li class="nav-items active">
          <a href="addRooms.php" class="nav-link">
            <i class="fa fa-bed mr-3" aria-hidden="true"></i> Add Rooms
          </a>
        </li>
        <li class="nav-items">
          <a href="roomAllocation.php" class="nav-link">
            <i class="fa fa-plus-square mr-3" aria-hidden="true"></i> Room Allocation
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
        <li class="nav-items">
          <a href="payment.php" class="nav-link">
            <i class="fa fa-credit-card mr-3" aria-hidden="true"></i> Payments
          </a>
        </li>
        <li class="nav-items active">
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
    <?php
    //adding room block C
    if (isset($_POST['add_room_block_c'])) {
      $room_number = htmlentities(mysqli_escape_string($connection, $_POST['room_number']));
      //validating
      if (!is_numeric($room_number)) {
        echo '
        <script>alert("Invalid Room Number")
        window.open("addRooms.php","_self")</script>
        ';
      } elseif (strlen($room_number) !== 3) {
        echo '
        <script>alert("Invalid Room Number")
        window.open("addRooms.php","_self")</script>
        ';
      } else {
        //getting ID of block C
        $id_row = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM blocks WHERE block_name = 'C' LIMIT 1"));
        $block_id = $id_row['id'];
        //checking if room_number is exists
        $room_check = mysqli_query($connection, "SELECT * FROM rooms WHERE room_number ='$room_number' AND block_id ='$block_id' LIMIT 1");
        if (mysqli_num_rows($room_check) == 1) {
          echo '
        <script>alert("Room Number Already Exist")
        window.open("addRooms.php","_self")</script>
        ';
        } else {
          //adding room
          $add_room = mysqli_query($connection, "INSERT INTO rooms(room_number,block_id) VALUES ('$room_number','$block_id')");
          if (!$add_room) {
            echo '
        <script>alert("Failed , Try Again")
        window.open("addRooms.php","_self")</script>
        ';
          } else {
            echo '
        <script>alert("Success, Room Added")
        window.open("addRooms.php","_self")</script>
        ';
          }
        }
      }
    }

    ?>
    <?php
    //adding room block D
    if (isset($_POST['add_room_block_d'])) {
      $room_number = htmlentities(mysqli_escape_string($connection, $_POST['room_number']));
      //validating
      if (!is_numeric($room_number)) {
        echo '
        <script>alert("Invalid Room Number")
        window.open("addRooms.php","_self")</script>
        ';
      } elseif (strlen($room_number) !== 3) {
        echo '
        <script>alert("Invalid Room Number")
        window.open("addRooms.php","_self")</script>
        ';
      } else {
        //getting ID of block C
        $id_row = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM blocks WHERE block_name = 'D' LIMIT 1"));
        $block_id = $id_row['id'];
        //checking if room_number is exists
        $room_check = mysqli_query($connection, "SELECT * FROM rooms WHERE room_number ='$room_number' AND block_id ='$block_id' LIMIT 1");
        if (mysqli_num_rows($room_check) == 1) {
          echo '
        <script>alert("Room Number Already Exist")
        window.open("addRooms.php","_self")</script>
        ';
        } else {
          //adding room
          $add_room = mysqli_query($connection, "INSERT INTO rooms(room_number,block_id) VALUES ('$room_number','$block_id')");
          if (!$add_room) {
            echo '
        <script>alert("Failed , Try Again")
        window.open("addRooms.php","_self")</script>
        ';
          } else {
            echo '
        <script>alert("Success, Room Added")
        window.open("addRooms.php","_self")</script>
        ';
          }
        }
      }
    }

    ?>
    <!-- end of sidebar -->
    <!-- contents -->
    <div class="col-md-9 col-lg-10 py-5 bg-light contents">
      <div class="card">
        <h5 class="card-header">Add Rooms</h5>
        <div class="card-body">
          <h6 class="card-title"></h6>
          <p class="card-text">
            <div class="row">
              <div class="col-md-5 ml-5 mr-3">
                <div class="card">
                  <div class="card-header font-weight-bold">BLOCK C</div>
                  <div class="card-body">
                    <form action="" method="POST" class="form-group" autocomplete="off">
                      <label class="form-control-label">Room Number</label>
                      <input type="text" name="room_number" class="form-control form-control-sm" placeholder="Room Number...">
                      <input type="submit" name="add_room_block_c" value="Add Room" class="btn btn-primary mt-3">
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card">
                  <div class="card-header font-weight-bold">BLOCK D</div>
                  <div class="card-body">
                    <form action="" method="POST" class="form-group" autocomplete="off">
                      <label class="form-control-label">Room Number</label>
                      <input type="text" name="room_number" class="form-control form-control-sm" placeholder="Room Number...">
                      <input type="submit" name="add_room_block_d" value="Add Room" class="btn btn-primary mt-3">
                    </form>
                  </div>
                </div>
              </div>
            </div>


        </div>
        </p>
      </div>
    </div>
  </div> <!-- end of contents -->
</div>
</div>
<?php include('includes/footer.php'); ?>