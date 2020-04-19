<?php
  session_start();
  require("database.php");
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
      <header>
            <ul>
              <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>

              <?php } else {
                if(isset($_SESSION['id_user'])) {
              ?>
              <li><a href="user/index.php">Dashboard</a></li>
              <?php
            }
            else if(isset($_SESSION['id_company'])) {
              ?>
              <li><a href="company/index.php">Dashboard</a></li>
            <?php } ?>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="admin">Admin</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <section id="about" class="content-header">

        <h1>About US</h1>
          <p>The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
            </p>
    </section>
