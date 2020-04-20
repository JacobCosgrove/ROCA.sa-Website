<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create Job Post | ROCA.sa</title>
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 300 });</script>
  <style>
    .form-control {
      margin: 5px;
      font-size: 18px;
    }
    #experience {
      width: 230px;
    }
  </style>
</head>
<body>
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>

            <h2><i>Create Job Post</i></h2>
              <form method="post" action="addpost.php">

                  <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">

                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>

                  <input type="number" class="form-control input-lg" id="minimumsalary" min="0" autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">

                  <input type="number" class="form-control input-lg" id="maximumsalary" min= "1000" name="maximumsalary" placeholder="Maximum Salary" required="">

                  <input type="number" class="form-control input-lg" id="experience"  min= "0" max= "5" autocomplete="off" name="experience" placeholder="Experience (yrs) Required" required="">

                  <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required="">

                  <button type="submit" class="btn btn-flat btn-success">Create</button>

              </form>


</body>
</html>
