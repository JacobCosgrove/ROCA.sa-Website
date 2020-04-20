<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='../login-style.css' />";

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Company | ROCA.sa</title>
</head>
<body>
  <div class= "topnav">
    <div>
      <b onclick="location.href='index.php'">ROCA.sa</b>
    </div>
  </div>

  <h2>Edit Company Profile</h2>
    <div class="form">
        <form action="update-company.php" method="post" enctype="multipart/form-data">
          <?php
          $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
          $result = $conn->query($sql);

          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
          ?>

                <input class="form-control input-lg" type="text" name="name" placeholder="Full Name" value="<?php echo $row['name']; ?>" required><br>

                <input class="form-control input-lg" type="text" name="companyname" placeholder="Company Name" value="<?php echo $row['companyname']; ?>" required><br>

                <input class="form-control input-lg" type="text" name="website" placeholder="Website" value="<?php echo $row['website']; ?>"><br>

                <input class="form-control input-lg" type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required><br>

                <input class="form-control input-lg" type="text" name="contactno" placeholder="Phone Number" value="<?php echo $row['contactno']; ?>" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required><br>

                <input class="form-control input-lg" type="text" id="country" name="country" placeholder="Country" value="<?php echo $row['country']; ?>"><br>

                <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City" value="<?php echo $row['city']; ?>"><br>

                <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State" value="<?php echo $row['state']; ?>"><br>

                <input class="form-control input-lg" type="text" name="aboutme" placeholder="Brief info about your company" value="<?php echo $row['aboutme']; ?>"></input><br>

                <label>Attach Company Logo</label>
                <input type="file" name="image" value="<?php echo $row['logo']; ?>"><br>

                <button type="submit" class="btn btn-flat btn-success">Update Profile</button>

                <?php
                  }
                }
              ?>
              </form>

            <?php if(isset($_SESSION['uploadError'])) { ?>

                <?php echo $_SESSION['uploadError']; ?>

            <?php unset($_SESSION['uploadError']); } ?>



        </div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
