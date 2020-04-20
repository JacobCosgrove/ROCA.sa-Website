<?php
  session_start();
  require("database.php");
  echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
  echo "<link rel='stylesheet' type='text/css' href='login-style.css' />";
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

    <h2>Create Company Profile</h2>

      <div class="form">

          <form method="post" id="registerCompanies" action="addcomp.php" enctype="multipart/form-data">

              <input class="form-control input-lg" type="text" name="name" placeholder="Full Name" required><br>

              <input class="form-control input-lg" type="text" name="companyname" placeholder="Company Name" required><br>

              <input class="form-control input-lg" type="text" name="website" placeholder="Website"><br>

              <input class="form-control input-lg" type="text" name="email" placeholder="Email" required><br>

              <input class="form-control input-lg" type="password" name="password" placeholder="Password" required><br>

              <input class="form-control input-lg" type="password" name="cpassword" placeholder="Confirm Password" required><br>

              <input class="form-control input-lg" type="text" name="contactno" placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required><br>

              <input class="form-control input-lg" type="text" id="city" name="country" placeholder="Country"><br>

              <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City"><br>

              <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State"><br>

              <input class="form-control input-lg" type="text" name="aboutme" placeholder="Brief info about your company"></input><br>

              <label>Attach Company Logo</label>
              <input type="file" name="image" required><br>


                <!-- <label><input type="checkbox" required> I accept terms & conditions</label><br> -->

                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>

              <?php
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                  <p class="text-center" style="color: red;">Email Already Exists! Choose A Different Email!</p>
              <?php
               unset($_SESSION['registerError']); }
              ?>
              <?php
              if(isset($_SESSION['uploadError'])) {
                ?>
                  <p class="text-center" style="color: red;"><?php echo $_SESSION['uploadError']; ?></p>
              <?php
               unset($_SESSION['uploadError']); }
              ?>
      </form>
    </div>
  </body>
</html>
