<?php
  session_start();
  require("database.php");
  echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

        <div class= "topnav">
          <div>
            <b>ROCA.sa</b>
          </div>
            <div>
              <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                <a href="login.php">Login</a>
                <!-- <a href="signup.php">Sign Up</a> -->

              <?php } else {
                if(isset($_SESSION['id_user'])) {
              ?>
              <a href="logout.php">Logout</a>
              <a href="user/index.php">Dashboard</a>
              <?php
            }
            else if(isset($_SESSION['id_company'])) {
              ?>
              <a href="logout.php">Logout</a>
              <a href="company/index.php">Dashboard</a>
            <?php }
              } ?>
          </div>
        </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/br1.jpg">
          <div class="carousel-caption">
            <!-- <h1>find a job</h1>
            <br>
            <button type="button" class="btn btn-default">Get Started</button> -->
          </div>
        </div> <!--- End Active --->
        <div class="item">
          <img src="img/br2.jpg">
        </div>
        <div class="item">
          <img src="img/br3.jpg">
        </div>
      </div>
      <!--- Start Slider Controls --->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> <!--- End Slider --->

    <div class= "about">
        <h1>About US</h1>
          <p>The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
          </p>
    </div>

    <footer class="container-fluid text-center">
      <div class="row">
        <div class="col-sm-4">
          <h3>Contact Us</h3>
          <h4>Our address and contact info here.</h4>
        </div>
        <div class="col-sm-4">
          <h3>Connect</h3>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
        </div>
        <div class="col-sm-4">
          <h3>
            <a href="admin">Admin</a>
          </h3>
        </div>
      </div>
    </footer>

  </body>
