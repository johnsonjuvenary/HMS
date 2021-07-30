<div class="card">
  <div class="card-body">
    <h5 class="text-dark text-center">Female Students Selected</h5>
    <hr />
    <?php
    //selecting only selected students
    $select_selected_students = mysqli_query($connection, "SELECT * FROM applicants,students WHERE gender = 'female' AND students.regno = applicants.student_regno AND selected = 'selected' ORDER BY 'first_name'");
    if (mysqli_num_rows($select_selected_students) == 0) : ?>
      <div class="alert alert-info">
        <span>None...</span>
      </div>
    <?php else :
      //counting male selected students
      $male_check = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM applicants,students WHERE students.regno = applicants.student_regno AND selected = 'selected' AND gender = 'male'"));
      //counting female selected students
      $female_check = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM applicants,students WHERE students.regno = applicants.student_regno AND selected = 'selected' AND gender = 'female'"));
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
              <th>Gender</th>
              <th>Address</th>
              <th>Disability</th>
              <th>Payment</th>
              <th>Approved By</th>
            </tr>
          </thead>
          <?php while ($result_select_selected_students = mysqli_fetch_array($select_selected_students)) :
              $first_name = $result_select_selected_students["first_name"];
              $middle_name = $result_select_selected_students["middle_name"];
              $last_name = $result_select_selected_students["last_name"];
              $student_name = $first_name . ' ' . substr($middle_name, 0, 1) . ' ' . substr($last_name, 0, 1); ?>
            <tbody>
              <tr>
                <td><?php echo strtoupper($result_select_selected_students["student_regno"]); ?></td>
                <td><?php echo ucfirst($result_select_selected_students["gender"]);  ?></td>
                <td><?php echo ucfirst($result_select_selected_students["physical_address"]); ?></td>
                <td><?php echo ucfirst($result_select_selected_students["disability_status"]); ?></td>
                <?php $payment_status =  $result_select_selected_students["payment"];
                    if ($payment_status == 'unpaid') : ?>
                  <td class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i></span> <?php echo ucfirst($payment_status); ?></td>
                <?php else : ?>
                  <td class="text-success"><span><i class="fa fa-check" aria-hidden="true"></i></span> <?php echo ucfirst($payment_status); ?></td>
                <?php endif; ?>

                <td><?php echo ucwords($result_select_selected_students["hostel_approval"]); ?></td>
              </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
      </div>

    <?php endif; ?>
  </div>
</div>