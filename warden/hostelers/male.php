<div class="card">
  <div class="card-body">
    <h5 class="text-dark text-center">Male Students Hostelers</h5>
    <hr />
    <?php
    //selecting only selected students
    $select_selected_students = mysqli_query($connection, "SELECT * FROM hostelers,students,applicants WHERE students.regno = hostelers.student_regno AND students.regno = applicants.student_regno AND students.gender = 'male' AND selected = 'selected' AND payment = 'paid' ORDER BY first_name");
    if (mysqli_num_rows($select_selected_students) == 0) : ?>
      <div class="alert alert-info">
        <span>None...</span>
      </div>
    <?php else :
      // //counting male hostelers
      $male_check = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM  students JOIN hostelers ON students.regno = hostelers.student_regno WHERE students.gender = 'male'"));
      //counting female hostelers
      $female_check =  mysqli_num_rows(mysqli_query($connection, "SELECT * FROM  students JOIN hostelers ON students.regno = hostelers.student_regno WHERE students.gender = 'female'"));
      $total_male_female = $male_check + $female_check;
    ?>
      <div class="table-responsive">
        <table class="table table-bordered" style="width:45%;">
          <tr class="btn-primary">
            <th>Male <span><i class="fa fa-male" aria-hidden="true"></i></span></th>
            <th>Female <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
            <th>Total <span><i class="fa fa-male" aria-hidden="true"></i></span>
              <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
          </tr>
          <tr style="text-align:center;">
            <td><?php echo $male_check; ?></td>
            <td><?php echo $female_check; ?></td>
            <td><?php echo $total_male_female; ?></td>
          </tr>
        </table>
        <table class="table table-bordered table-hover" id="table">
          <thead class="btn-primary">
            <tr>
              <th>Student Reg#</th>
              <th>Student Name</th>
              <th>Hostel Approved By</th>
              <th>Details</th>
            </tr>
          </thead>
          <?php while ($result_select_selected_students = mysqli_fetch_array($select_selected_students)) :
            $first_name = $result_select_selected_students["first_name"];
            $middle_name = $result_select_selected_students["middle_name"];
            $last_name = $result_select_selected_students["last_name"];
            $student_name = $first_name . ' ' . $middle_name . ' ' . $last_name; ?>
            <tbody>
              <tr>
                <td><?php echo strtoupper($result_select_selected_students["student_regno"]); ?></td>
                <td><?php echo ucwords($student_name); ?></td>
                <td><?php echo ucwords($result_select_selected_students["hostel_approval"]); ?></td>
                <?php $regno = $result_select_selected_students["student_regno"]; ?>
                <td> <button type="submit" class="btn btn-outline-primary" onclick="window.location.href='hosteler_details.php?view=<?php echo $regno; ?>';">view</button> </td>
              </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
      </div>

    <?php endif; ?>
  </div>
</div>