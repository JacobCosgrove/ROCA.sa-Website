<?php

//To Handle Session Variables on This Page
session_start();

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
  <title>Company Dashboard | LA Jobs</title>
</head>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php">
      <span><b>LA Jobs</b></span>
    </a>

  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">

                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="index.php"> Dashboard</a></li>
                  <li><a href="edit-company.php"> My Company</a></li>
                  <li><a href="create-job-post.php"> Create Job Post</a></li>
                  <li><a href="my-job-post.php"> My Job Post</a></li>
                  <li><a href="job-applications.php"> Job Application</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="resume-database.php"> Resume Database</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>

    </section>



  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
