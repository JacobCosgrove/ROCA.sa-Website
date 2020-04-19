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
    <header class="main-head">
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

        <h1>Registration</h1>
        <h3>User Register</h3>
        <a href="registeruser.php">Register</a>
        <h3>Company Register</h3>
        <a href="registercompany.php">Register</a>
      </body>
    </html>
