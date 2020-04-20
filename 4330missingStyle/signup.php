<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='login-pick-style.css' />";

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
        <div>
          <b onclick="location.href='index.php'">ROCA.sa</b>
        </div>
      </div>
    </header>

    <div class = "about">
      <h1>Registration</h1>
    </div>

    <div class="container">
      <div class="row">
        <button class="col-md-6" onclick="location.href='registeruser.php'">
          <h2>User Register</h2>
        </button>
        <button class="col-md-6" onclick="location.href='registercompany.php'">
          <h2>Company Register</h2>
        </button>
      </div>
    </div>
    
  </body>
</html>
