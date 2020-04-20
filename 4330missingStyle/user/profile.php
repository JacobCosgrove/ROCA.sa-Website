<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='../login-style.css' />";

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit User | ROCA.sa</title>
</head>
<body>
  <div class= "topnav">
    <div>
      <b onclick="location.href='../index.php'">ROCA.sa</b>
    </div>
  </div>

  <h2>Edit User Profile</h2>
      <div class="form">
            <form action="edit-profile.php" method="post" enctype="multipart/form-data">
            <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>

                <input  type="text" id="fname" name="fname" placeholder="First Name *" value="<?php echo $row['firstname']; ?>" required><br>

                <input  type="text" id="lname" name="lname" placeholder="Last Name *" value="<?php echo $row['lastname']; ?>" required><br>

                <input  type="text" id="email" name="email" placeholder="Email *" value="<?php echo $row['email']; ?>" required><br>

                <input  type="text" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" value="<?php echo $row['aboutme']; ?>" required></input><br>

                <input  type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number" value="<?php echo $row['contactno']; ?>"><br>

                <input  type="text" id="address" name="address" placeholder="Address" value="<?php echo $row['address']; ?>"></input><br>

                <input  type="text" id="city" name="city" placeholder="City" value="<?php echo $row['city']; ?>"><br>

                <input  type="text" id="state" name="state" placeholder="State" value="<?php echo $row['state']; ?>"><br>

                <input  type="text" id="skills" name="skills" placeholder="Enter Skills" value="<?php echo $row['skills']; ?>"></input><br>

                <input  type="text" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>"><br>

                <label style="color: red;">File Format PDF Only!</label>
                <input type="file" name="resume" value="<?php echo $row['resume']; ?>"><br>

                <button type="submit" class="btn btn-flat btn-success">Update Profile</button>

              <?php
                }
              }
            ?>
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
          </div>

</body>
</html>
