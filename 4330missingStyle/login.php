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


      </ul>
    </header>

    <h1>Login</h1>
    <h3>User Login</h3>
    <a href="user-login.php">Login</a>
    <h3>Company Login</h3>
    <a href="company-login.php">Login</a>
  </body>
</html>
