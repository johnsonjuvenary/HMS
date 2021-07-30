      <div class="py-4" style="color:#2f4f4f">
        <center>
          <img src="../images/hostel_nav.png" alt="" width="150" class="img-fluid rounded-circle img-thumbnail mr-3" />
          <br />

          <?php
          // profile name
          $query_profile_name = mysqli_query($connection, "SELECT name FROM warden WHERE name = '$_SESSION[warden]'");
          while ($row_profile_name = mysqli_fetch_array($query_profile_name)) { ?>
            <span> <?php
                      echo ucfirst($row_profile_name["name"]);
                    }
                    ?>
            </span>
        </center>
      </div>