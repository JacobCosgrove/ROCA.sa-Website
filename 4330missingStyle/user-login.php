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
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
      <!-- /.login-logo -->
      
        <p class="login-box-msg">User Login</p>

        <form method="post" action="checkuser.php">

            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>


              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

            <!-- /.col -->

        </form>
    </body>
</html>
