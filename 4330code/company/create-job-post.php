<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//check if user is logged in. redirect if not
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
  <!-- top nav bar -->
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>
          <!-- give the recruiter fields to create a job post then calls addpost.php to confirm and submit to database -->
          
            <h2><i>Create Job Post</i></h2>
              <form method="post" action="addpost.php">

                  <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">

                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>

                  <input type="number" class="form-control input-lg" id="minimumsalary" min="0" autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">

                  <input type="number" class="form-control input-lg" id="maximumsalary" min= "1000" name="maximumsalary" placeholder="Maximum Salary" required="">

                  <input type="number" class="form-control input-lg" id="experience"  min= "0" max= "10" autocomplete="off" name="experience" placeholder="Experience (yrs) Required" required="">

                  <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required="">

                  <button type="submit" class="btn btn-flat btn-success">Create</button>

              </form>


</body>
</html>
