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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-box-body">
    <p class="login-box-msg">Candidates Login</p>

    <form method="post" action="checklogin.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a>
        </div>

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

      </div>
    </form>

    <br>

    <?php
    //If User have successfully registered then show them this success message
    //Todo: Remove Success Message without reload?
    if(isset($_SESSION['registerCompleted'])) {
      ?>
      <div>
        <p id="successMessage" class="text-center">Check your email!</p>
      </div>
    <?php
     unset($_SESSION['registerCompleted']); }
    ?>
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

    <?php
    //If User Failed To log in then show error message.
    if(isset($_SESSION['userActivated'])) {
      ?>
      <div>
        <p class="text-center">Your Account Is Active. You Can Login</p>
      </div>
    <?php
     unset($_SESSION['userActivated']); }
    ?>

     <?php
    //If User Failed To log in then show error message.
    if(isset($_SESSION['loginActiveError'])) {
      ?>
      <div>
        <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
      </div>
    <?php
     unset($_SESSION['loginActiveError']); }
    ?>

  </div>

</div>


</body>
</html>
