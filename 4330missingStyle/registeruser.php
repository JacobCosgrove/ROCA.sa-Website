<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='login-style.css' />";

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div class= "topnav">
      <div>
        <b onclick="location.href='index.php'">ROCA.sa</b>
      </div>
    </div>

    <h2>Create User Profile</h2>

      <div class="form">

          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">

                <input  type="text" id="fname" name="fname" placeholder="First Name *" required><br>

                <input  type="text" id="lname" name="lname" placeholder="Last Name *" required><br>

                <input  type="text" id="email" name="email" placeholder="Email *" required><br>

                <input  type="password" id="password" name="password" placeholder="Password *" required><br>

                <input  type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required><br>

                <input  type="text" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></input><br>

                <label>Date Of Birth</label>
                <input  type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth"><br>

                <input  type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number"><br>

                <input  type="text" id="address" name="address" placeholder="Address"></input><br>

                <input  type="text" id="city" name="city" placeholder="City"><br>

                <input  type="text" id="state" name="state" placeholder="State"><br>

                <input  type="text" id="skills" name="skills" placeholder="Enter Skills"></input><br>

                <input  type="text" id="qualification" name="qualification" placeholder="Highest Qualification"><br>

                <label style="color: red;">File Format PDF Only!</label>

                <input type="file" name="resume" required><br>

                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>

                              <?php
                              //If User already registered with this email then show error message.
                              if(isset($_SESSION['registerError'])) {
                                ?>

                                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>

                              <?php
                               unset($_SESSION['registerError']); }
                              ?>

                              <?php if(isset($_SESSION['uploadError'])) { ?>

                                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>

                              <?php unset($_SESSION['uploadError']); } ?>

      </form>
    </div>
  </body>
</html>
