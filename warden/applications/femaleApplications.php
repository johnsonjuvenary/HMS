<div class="card">
  <div class="card-body">
    <h5 class="text-dark text-center">Female Students Applications</h5>
    <hr />
    <?php
    //checking for applications
    $check_applications = mysqli_query($connection, "SELECT * FROM applicants,students WHERE applicants.student_regno = students.regno AND gender = 'female' ORDER BY when_applied ");
    if (mysqli_num_rows($check_applications) == 0) : ?>
      <div class="alert alert-info">
        <span>No Applications have been made so far...</span>
      </div>
    <?php else : ?>
      <div class="table-responsive">
        <?php
          $male_applied = mysqli_num_rows(mysqli_query($connection, "SELECT *  FROM applicants,students WHERE applicants.student_regno = students.regno AND gender = 'male'"));
          $female_applied = mysqli_num_rows(mysqli_query($connection, "SELECT *  FROM applicants,students WHERE applicants.student_regno = students.regno AND gender = 'female'"));
          $total_applied = $male_applied + $female_applied;
          ?>
      <table class="table table-bordered" style="width:40%;">
                  <tr class="btn-primary">
                  <th>Female <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
                    <th>Male <span><i class="fa fa-male" aria-hidden="true"></i></span></th>
                    <th>Total <span><i class="fa fa-male" aria-hidden="true"></i></span>
                      <span><i class="fa fa-female" aria-hidden="true"></i></span></th>
                  </tr>
                  <tr style="text-align:center;">
                    <td><?php echo $female_applied; ?></td>
                    <td><?php echo $male_applied; ?></td>
                    <td><?php echo $total_applied; ?></td>
                  </tr>
                </table>
        <br />
        <table class="table table-bordered table-hover" id="table">
          <thead class="btn-primary">
            <tr>
              <th>Student Name</th>
              <th>Student Reg#</th>
              <th>Gender</th>
              <th>Selection Status</th>
              <th>Details</th>
            </tr>
          </thead>
          <?php while ($result_check_applications = mysqli_fetch_array($check_applications)) :
              $regno = strtoupper($result_check_applications["student_regno"]);
              $first_name = $result_check_applications["first_name"];
              $middle_name = $result_check_applications["middle_name"];
              $last_name = $result_check_applications["last_name"];
              $student_name = $first_name . ' ' . $middle_name . ' ' . $last_name;
              ?>
            <tbody>
              <tr>
                <td> <?php echo ucwords($student_name); ?></td>
                <td> <?php echo strtoupper($result_check_applications["student_regno"]); ?></td>
                <td><?php echo ucfirst($result_check_applications["gender"]) ?></td>
                <?php
                    //checking selection status
                    $selection_status = $result_check_applications["selected"];
                    if ($selection_status == 'unselected') : ?>
                  <td class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i></span> <?php echo ucfirst($selection_status); ?></td>
                <?php else : ?>
                  <td class="text-success"><span><i class="fa fa-check" aria-hidden="true"></i></span> <?php echo ucfirst($selection_status); ?></td>
                <?php endif; ?>
                <td> <button type="submit" class="btn btn-outline-primary" onclick="window.location.href='applicant_details.php?view=<?php echo $regno; ?>';">view</button> </td>
              </tr>
            </tbody>
          <?php endwhile; ?>
        </table>
      </div>
    <?php endif; ?>
  </div>

</div>