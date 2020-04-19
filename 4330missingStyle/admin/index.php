<?php

session_start();

if(isset($_SESSION['id_admin'])) {
  header("Location: home.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body class="hold-transition login-page">
    <p class="login-box-msg">Admin Login</p>

    <form action="checkadmin.php" method="post">

        <input type="text" class="form-control" name="username" placeholder="Username">

        <input type="password" class="form-control" name="password" placeholder="Password">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

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

</body>
</html>
