<?php

session_start();

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
    <header>
      <ul>
        <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>

          <?php } else {
            if(isset($_SESSION['id_user'])) {
          ?>

          <li><a href="user/index.php">Dashboard</a></li>

          <?php
          }
            else if(isset($_SESSION['id_company'])) {
          ?>
          <li><a href="company/index.php">Dashboard</a></li>
          <?php } ?>
          <li><a href="logout.php">Logout</a></li>
          <?php } ?>
          <li><a href="jobs.php">Jobs</a></li>

      </ul>
    </header>
          <h1>CREATE YOUR PROFILE</h1>
          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">

                <input  type="text" id="fname" name="fname" placeholder="First Name *" required><br>

                <input  type="text" id="lname" name="lname" placeholder="Last Name *" required><br>

                <input  type="text" id="email" name="email" placeholder="Email *" required><br>

                <textarea  rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea><br>

                <label>Date Of Birth</label>
                <input  type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth"><br>

                <input  type="text" id="qualification" name="qualification" placeholder="Highest Qualification"><br>

                <input  type="password" id="password" name="password" placeholder="Password *" required><br>

                <input  type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required><br>

                <input  type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number"><br>

                <textarea  rows="4" id="address" name="address" placeholder="Address"></textarea><br>

                <input  type="text" id="city" name="city" placeholder="City"><br>

                <input  type="text" id="state" name="state" placeholder="State"><br>

                <textarea  rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea><br>

                <input  type="text" id="stream" name="stream" placeholder="Stream"><br>

                <label style="color: red;">File Format PDF Only!</label>

                <input type="file" name="resume" required><br>

                                <label><input type="checkbox"> I accept terms & conditions</label><br>

                                <button name="reg_user">Register</button><br>

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
</body>
</html>
