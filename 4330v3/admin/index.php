<?php

session_start();

if(isset($_SESSION['id_admin'])) {
  header("Location: dashboard.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="">
    <a href="../index.php"><b>Job</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="">
    <p class="">Admin Login</p>

    <form action="checklogin.php" method="post">
      <div class="">
        <input type="text" class="form-control" name="username" placeholder="Username">
      </div>
      <div class="">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class=""></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
      <?php
//If User Failed To log in then show error message.
if(isset($_SESSION['loginError'])) {
  ?>
  <div>
    <p class="text-center">Invalid Email/Password! Try Again!</p>
  </div>
<?php
 unset($_SESSION['loginError']); }
?>

    </form>
  </div>
</div>


</body>
</html>
