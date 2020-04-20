<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='login-pick-style.css' />";
//echo "<link rel='stylesheet' type='text/css' href='login-style.css' />";

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header class="main-head">

      <div class= "topnav">
        <b onclick="location.href='index.php'">ROCA.sa</b>
      </div>
      
      <ul>
        <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

          <!-- <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li> -->

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

  <div class = "about">
    <h1>Login</h1>
  </div>

  <div class="container">
    <div class="row">
      <button class="col-md-6" onclick="location.href='user-login.php'">
        <h2>User Login</h2>
      </button>
      <button class="col-md-6" onclick="location.href='company-login.php'">
        <h2>Company Login</h2>
      </button>
    </div>
  </div>

  <p>
    <a href="signup.php">Don't have an account?</b>
  </p>


  </body>
</html>
