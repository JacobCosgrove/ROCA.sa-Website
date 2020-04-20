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

    <h2>Company Login</h2>

      <div class="form">
        <form method="post" action="checkcomp.php">

            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            <!-- /.col -->

            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

            <!-- /.col -->

        </form>
      </div>
    </body>
</html>
