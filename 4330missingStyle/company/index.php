<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='../login-pick-style.css' />";

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Company Dashboard | ROCA.sa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <div class= "topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="edit-company.php">My Company</a>
  </div>

  <h2>Welcome <strong><?php echo $_SESSION['name']; ?></strong></h2>
  <br>

    <div class="row">

      <div class="col-md-1"></div>

      <button class="col-md-2 " onclick="location.href='create-job-post.php'">
        <h2>Create Job Post</h2>
      </button>

      <button class="col-md-2" onclick="location.href='my-job-post.php'">
        <h2>My Job Posts</h2>
      </button>

      <button class="col-md-2" onclick="location.href='job-applications.php'">
        <h2>Applications</h2>
      </button>

      <button class="col-md-2" onclick="location.href='mailbox.php'">
        <h2>Mailbox</h2>
      </button>

      <button class="col-md-2" onclick="location.href='resume-database.php'">
        <h2>Resumé Database</h2>
      </button>

      <div class="col-md-1"></div>

    </div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
