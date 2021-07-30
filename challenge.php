<?php 
$H='';



 ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="">
  <title>Challenge</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<body class="mt-5 mb-5">
  <div class="container col-md-3 mt-5">
    <div class="card">
      <div class="card-header text-center text-info"><h3>TIME COUNTER</h3></div>
      <div class="card-body">
        <table class="table table-bordered  text-center">
          <tbody>
            <tr>
              <td>Hour</td>
              <td>Minute</td>
              <td>Second</td>
            </tr>
            <tr>
              <td><?php echo $hour; ?></td>
              <td><?php echo $minute; ?></td>
              <td><?php echo $second; ?></td>
            </tr>
          </tbody>
          
        </table>
      </div>
      <div class="card-footer">
        <form action="" method="POST">
                  <div class="row">
          <div class="col-md-6">
                    <input type="submit" value="START" name="start" class="btn btn-success btn-block">
          </div>
          <div class="col-md-6">
                <input type="submit" value="STOP" name="stop" class="btn btn-danger btn-block">
          </div>
        </div>
        </form>
      </div>
    </div>
    
  </div>

  <!--jquery-->
  <script src="js/jquery.min.js"></script>
  <!-- jquery slimscroll -->
  <script src="js/jquery.slimscroll.min.js"> </script>
  <!-- bootstrap -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>