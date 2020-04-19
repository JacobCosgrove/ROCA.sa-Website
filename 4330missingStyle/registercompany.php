<?php
  session_start();
  require("database.php");
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
    <div class="wrapper">
      <header class="main-head">
            <ul class="nav navbar-nav">
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
            <li><a href="admin">Admin</a></li>
          </ul>
        </div>
      </nav>
    </header>

  <!-- Content Wrapper. Contains page content -->
  <div>

   <section>

          <h1>CREATE COMPANY PROFILE</h1>
          <form method="post" id="registerCompanies" action="addcomp.php" enctype="multipart/form-data">

                <input class="form-control input-lg" type="text" name="name" placeholder="Full Name" required><br>

                <input class="form-control input-lg" type="text" name="companyname" placeholder="Company Name" required><br>

                <input class="form-control input-lg" type="text" name="website" placeholder="Website"><br>

                <input class="form-control input-lg" type="text" name="email" placeholder="Email" required><br>

                <textarea class="form-control input-lg" rows="4" name="aboutme" placeholder="Brief info about your company"></textarea><br>

                <input class="form-control input-lg" type="password" name="password" placeholder="Password" required><br>

                <input class="form-control input-lg" type="password" name="cpassword" placeholder="Confirm Password" required><br>

                <input class="form-control input-lg" type="text" name="contactno" placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required><br>

              <input class="form-control input-lg" type="text" id="city" name="country" placeholder="Country"><br>

              <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City"><br>

              <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State"><br>

                <label>Attach Company Logo</label>
                <input type="file" name="image" required><br>


                <label><input type="checkbox" required> I accept terms & conditions</label><br>

                <button type="submit">Register</button>
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

    </section>

  </div>
  <!-- /.content-wrapper -->

</body>
</html>
