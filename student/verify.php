<?php include('configurations/verify.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Student Registration| HMS</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="../css/fontawesome/css/all.min.css" />
  <!-- favicon -->
  <link rel="shortcut icon" href="../images/hostel_nav.png" type="image/x-icon" />
  <!-- custom styles -->
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body onload="myFunction()" style="margin:0;">
  <div id="loader"></div>
  <div style="display:none;" id="myDiv" class="animate-bottom">
    <div class="registration-body">
      <div class="main-form">

        <form action="verify.php" method="post" class="form-group">
          <div class="form-header">
            <h2>hostel management system</h2>
            <h3>Student Verification</h3>
          </div>
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
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text form-icon" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i></span>
              </div>
              <input type="text" name="regno" id="registration number" value="<?php echo $regno; ?>" class="form-control" placeholder="Enter Your Registration Number" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block btn-lg" name="student_verify" value="Verify">
          </div>
        </form>
        <div class="text-center small" style="color: #674288;">
          Already have an account <a href="index.php">login</a>
        </div>
      </div>
    </div>
  </div>
  <!--jquery-->
  <script src="../js/jquery.min.js"></script>
  <!-- jquery slimscroll -->
  <script src="../js/jquery.slimscroll.min.js"> </script>
  <!-- bootstrap -->
  <script src="../js/bootstrap/bootstrap.min.js"></script>
  <!-- custom-->
  <script src="../js/custom.js"></script>

</body>

</html>