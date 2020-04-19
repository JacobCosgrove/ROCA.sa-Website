<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}
  require_once("../database.php");
 ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
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
  <div>

    <section>

                <h3>Welcome <b><?php echo $_SESSION['name']; ?></b></h3>


               <ul>
                  <li><a href="profile.php"> Edit Profile</a></li>
                  <li class="active"><a href="index.php"> My Applications</a></li>
                  <li><a href="../jobs.php"> Jobs</a></li>
                  <li><a href="inbox.php"> Mailbox</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>




            <h2><i>Recent Applications</i></h2>

            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc())
                    {
            ?>
            <div class="attachment-block clearfix padding-2">
                <h4 class="attachment-heading"><a href="view-job.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                <div class="attachment-text padding-2">
                  <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>
                  <?php

                  if($row['status'] == 0) {
                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                  }
                  ?>

                </div>
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
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>
</body>
</html>
