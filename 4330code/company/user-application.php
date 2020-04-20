<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//check if logged in, if not redirect
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");

//query to get user data from db to display in table later
$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]'";
$result = $conn->query($sql);
if($result->num_rows == 0)
{
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Applications | ROCA.sa</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div>
    <h2><i>Applications</i></h2>

              <?php
               $sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
                $result = $conn->query($sql);

                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc())
                  {
                ?>
                <div class="pull-left">
                  <h3><b><i><?php echo $row['firstname']. ' '.$row['lastname']; ?></i></b></h3>
                </div>
                <div class="clearfix"></div>
               <!-- talbe with info that was fetched and displays as well as has a download resume button -->
                <div>
                  <?php
                    echo 'Email: '.$row['email'];
                    echo '<br>';
                    echo 'City: '.$row['city'];
                    echo '<br>';
                    if($row['resume']) {
                      echo '<a href="../uploads/resume/'.$row['resume'].'" class="btn btn-info" download="Resume">Download Resume</a>';
                    }

                    echo '<br>';
                    echo '<br>';
                  ?>
                  <!-- reject and under view buttons -->
                  <div class="row">
                    <div class="col-md-3 pull-left">
                      <a href="under-review.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-success">Mark Under Review</a>
                    </div>
                    <div class="col-md-3 pull-right">
                      <a href="reject.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-danger">Reject Application</a>
                    </div>
                  </div>
                </div>
                <br><hr>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

</body>
</html>
