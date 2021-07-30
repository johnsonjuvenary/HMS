 <?php
  if (isset($_POST['allocate_room_male'])) {
    //assigning and escaping injection
    $student_regno = htmlentities(mysqli_escape_string($connection, $_POST['student_regno']));
    $block_name = htmlentities(mysqli_escape_string($connection, $_POST['block_name']));
    $room_number = htmlentities(mysqli_escape_string($connection, $_POST['room_number']));
    //check if student has already allocated
    $student_check = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM hostelers WHERE student_regno = '$student_regno' LIMIT 1"));
    if ($student_check == 1) {
      echo "<script>alert('Student already selected')
      window.location('roomAllocation.php','_self')</script>
      ";
    } else {
      //checking if block and room exists
      $check_block_room = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM rooms,blocks WHERE blocks.id = rooms.block_id AND block_name = '$block_name' AND room_number = '$room_number'"));
      if ($check_block_room == 0) {
        echo "<script>alert('Invalid Block Name or Room Number')
      window.location('roomAllocation.php','_self')</script>
      ";
      } else {
        // checking if rooms has four students
        $room_check = mysqli_num_rows(mysqli_query($connection, "SELECT room_number,block_name FROM hostelers WHERE block_name = 'C' AND room_number = '$room_number'"));
        if ($room_check == 4) {
          echo "<script>alert('Room Full, please try another room')
      window.location('roomAllocation.php','_self')</script>
      ";
        } else {
          //allocating room
          $allocating = mysqli_query($connection, "INSERT INTO hostelers (student_regno,block_name,room_number) VALUES ('$student_regno','$block_name','$room_number')");
          if (!$allocating) {
            echo "<script>alert('Failed to Allocate room, please try again')
      window.location('roomAllocation.php','_self')</script>
      ";
          } else {
            echo "<script>alert('Room allocated Successful')
      window.location('roomAllocation.php','_self')</script>
      ";
          }
        }
      }
    }
  }
  ?>
 <div class="card">
   <div class="card-body">
     <h5 class="text-dark text-center">Male Students Rooms Allocation</h5>
     <hr />
     <?php
      //returning students
      $students = mysqli_query($connection, "SELECT * FROM students INNER JOIN applicants ON students.regno = applicants.student_regno AND applicants.payment = 'paid' AND applicants.selected = 'selected' AND students.gender = 'male' AND students.regno NOT IN (SELECT student_regno FROM hostelers)");
      //returning rooms
      $rooms_blocks = mysqli_query($connection, "SELECT * FROM rooms JOIN blocks ON rooms.block_id = blocks.id AND block_name = 'C' ORDER BY room_number");
      ?>
     <div class="container">
       <form action="" method="POST" class="form-group">
         <div class="form-row">
           <div class="col-md-4">
             <select class="form-control" name="student_regno" id="">
               <option value="#">Registration Number</option>
               <?php
                while ($student_regno = mysqli_fetch_array($students)) : ?>
                 <option value="<?php echo strtoupper($student_regno["student_regno"]); ?>"><?php echo strtoupper($student_regno["student_regno"]); ?></option>
               <?php endwhile; ?>
             </select>
           </div>
           <div class="col-md-1">
             <input type="text" class="form-control" name="block_name" value="C" readonly>
           </div>
           <div class="col-md-3">
             <select class="form-control" name="room_number" id="">
               <option value="#">Room Number</option>
               <?php
                while ($rooms = mysqli_fetch_array($rooms_blocks)) : ?>
                 <option value="<?php echo $rooms["room_number"]; ?>"><?php echo $rooms["room_number"]; ?></option>
               <?php endwhile; ?>
             </select>
           </div>
           <div class="col-md-4">
             <input type="submit" name="allocate_room_male" class="form-control btn btn-primary" value="Allocate Room">
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>