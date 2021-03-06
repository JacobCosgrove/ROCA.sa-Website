<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//check if logged in. redirect if not.
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
  <title>Job Applications | ROCA.sa</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <style>
    #apps {
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>

  <!-- Content Wrapper. Contains page content -->

<h2><i>Recent Applications</i></h2>

            <?php

            // triple inner join to connect info for users jobs post and applied job posts

             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc())
                    {
            ?>
            <!-- populate table with info from triple inner join -->
            
            <div id="apps" class="attachment-block clearfix padding-2">
                <h4><a href="user-application.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle'].' @ ('.$row['firstname'].' '.$row['lastname'].')'; ?></a></h4>
                  <div><?php echo $row['createdat']; ?></div>
                  <?php
                  //status off applicants on job
                  if($row['status'] == 0) {
                    echo '<div class="pull-right"><strong>Pending</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right"><strong>Rejected</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right"><strong>Under Review</strong></div> ';
                  }
                  ?>
            <?php
              }
            }
            ?>



          </div>
  <!-- /.content-wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
