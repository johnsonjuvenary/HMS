      <div class="py-4" style="color:#2f4f4f">
        <center>
          <img src="../images/hostel_nav.png" alt="profile_pic" width="150" class="img-fluid rounded-circle img-thumbnail mr-3" />
          <br />

          <?php
          // profile name
          $query_profile_name = mysqli_query($connection, "SELECT first_name FROM students WHERE regno = '$_SESSION[student]'");
          while ($row_profile_name = mysqli_fetch_array($query_profile_name)) { ?>
            <span> <?php
                      echo ucfirst($row_profile_name["first_name"]);
                    }
                    ?>
            </span>
        </center>
      </div>