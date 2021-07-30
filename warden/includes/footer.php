<!-- the modal -->
<div class="modal fade" id="sign-out">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modaL header -->
      <div class="modal-header">
        <h5 class="modal-title">
          <?php
          $query_profile_name = mysqli_query($connection, "SELECT name FROM warden WHERE name = '$_SESSION[warden]'");
          while ($row_profile_name = mysqli_fetch_array($query_profile_name)) { ?>
            <span> <?php
                    echo "Hello " . ucfirst($row_profile_name["name"]);
                  }
                    ?>
            </span>
        </h5>
        <button class="close" type="button" data-dismiss="modal">
          &times;
        </button>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        Do You Want to Leave?
      </div>
      <!-- end of modal body -->
      <!-- modal footer -->
      <div class="modal-footer">
        <button class="btn btn-info btn-block" type="button" data-dismiss="modal">
          Stay
        </button>
        <button class="btn btn-danger btn-block" type="button" data-dismiss="modal" onclick="window.location.href= 'logout.php';">
          Leave
        </button>
      </div>
      <!-- end of modal footer -->
    </div>
  </div>
</div>
<footer class="footer mt-auto py-3 text-right">
  <div class="container">
    <span class="text-muted">&copy; <?php echo date("Y") ?> Hostel Management System </span> <br />
    <span class="text-muted">Term of use / Privacy Policy</span>
  </div>
</footer>
<!--jquery-->
<script src="../js/jquery.min.js"></script>
<!-- jquery slimscroll -->
<script src="../js/jquery.slimscroll.min.js"> </script>
<!-- bootstrap -->
<script src="../js/bootstrap/bootstrap.min.js"></script>
<!-- custom js -->
<!--   <script src="../js/custom.js"></script> -->

<!-- toggler button -->
<script>
  $(".navbar-toggler").html(
    '<i class="fa fa-bars fa-1x text-white" aria-hidden="true"></i>'
  );
</script>
<!-- end of toggler button -->
</body>

</html>