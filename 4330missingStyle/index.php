<?php
  session_start();
  require("database.php");
  echo "<link rel='stylesheet' type='text/css' href='style.css' />";
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href= -->
  </head>
  <body>
    <div>
    <header>
        <div class= "topnav">
          <div>
            <b>ROCA.sa</b>
          </div>
            <div>
              <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>

              <?php } else {
                if(isset($_SESSION['id_user'])) {
              ?>
              <a href="user/index.php">Dashboard</a>
              <?php
            }
            else if(isset($_SESSION['id_company'])) {
              ?>
              <a href="company/index.php">Dashboard</a>
            <?php } ?>
            <a href="logout.php">Logout</a>
            <?php } ?>
            <a href="jobs.php">Jobs</a>
            <a href="admin">Admin</a>
          </div>
        </div>
      </div>
    </header>

    <section class= "about">

        <h1>About US</h1>
          <p>The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
            </p>
    </section>
