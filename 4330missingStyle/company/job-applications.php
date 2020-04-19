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
  <title>Job Applications | VetBosSel</title>
</head>
<body>
<div>

  <header class="main-header">
    <a href="index.php">
      <span><b>LA Jobs</b></span>
    </a>

  </header>

  <!-- Content Wrapper. Contains page content -->
  <div>

    <section>
                <h3>Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                <ul>
                  <li><a href="index.php"> Dashboard</a></li>
                  <li><a href="edit-company.php"> My Company</a></li>
                  <li><a href="create-job-post.php"> Create Job Post</a></li>
                  <li><a href="my-job-post.php"> My Job Post</a></li>
                  <li class="active"><a href="job-applications.php"> Job Application</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="resume-database.php"> Resume Database</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>
            <h2><i>Recent Applications</i></h2>

            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc())
                    {
            ?>
            <div class="attachment-block clearfix padding-2">
                <h4><a href="user-application.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle'].' @ ('.$row['firstname'].' '.$row['lastname'].')'; ?></a></h4>
                  <div><?php echo $row['createdat']; ?></div>
                  <?php

                  if($row['status'] == 0) {
                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                  }
                  ?>
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
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
