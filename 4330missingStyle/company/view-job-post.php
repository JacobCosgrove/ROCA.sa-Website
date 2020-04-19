<?php

session_start();

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
  <title>View Job | LA Jobs</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php">
      <span class="logo-lg"><b>LA Jobs</b></span>
    </a>

  </header>

  <!-- Content Wrapper. Contains page content -->
  <div>

    <section>



                <h3>Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"> Dashboard</a></li>
                  <li><a href="edit-company.php"> My Company</a></li>
                  <li><a href="create-job-post.php">Create Job Post</a></li>
                  <li class="active"><a href="my-job-post.php"> My Job Post</a></li>
                  <li><a href="job-applications.php"> Job Application</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="resume-database.php"> Resume Database</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>

              <?php
               $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]' AND id_jobpost='$_GET[id]'";
                $result = $conn->query($sql);

                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc())
                  {
                ?>
                <div class="pull-left">
                  <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
                </div>
                <div class="pull-right">
                  <a href="my-job-post.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                  <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['experience']; ?> Years Experience</span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>
                </div>
                <div>
                  <?php echo stripcslashes($row['description']); ?>
                </div>
                <div>
                </div>
                <?php
                  }
                }
                ?>

    </section>




  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

</body>
</html>
