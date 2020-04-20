<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='../login-pick-style.css' />";
echo "<link rel='stylesheet' type='text/css' href='../table.css' />";

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
    <title>User Dashboard | ROCA.sa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class= "topnav">
      <b onclick="location.href='../index.php'">ROCA.sa</b>
      <a href="../logout.php">Logout</a>
      <a href="profile.php">Edit Profile</a>
    </div>


    <h2>Welcome <strong><?php echo $_SESSION['name']; ?></strong></h2>
    <br>

    <h2><i>Applications</i></h2>

    <table id="app-table">
      <tr>
        <th>Job Title</th>
        <th>Company</th>
        <th>Date Applied</th>
        <th>Status</th>
      </tr>

            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost INNER JOIN company ON job_post.id_company=company.id_company WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                  $result = $conn->query($sql);

              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                {
            ?>
                  <tr>
                    <td>
                      <a href="view-job.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a>
                    </td>
                    <td><?php echo $row['companyname']; ?></td>
                    <td><?php echo $row['createdat']; ?></td>
                    <td>
                      <?php
                      if($row['status'] == 0) {
                        echo '<div><strong>Pending</strong></div>';
                      } else if ($row['status'] == 1) {
                        echo '<div><strong>Rejected</strong></div>';
                      } else if ($row['status'] == 2) {
                        echo '<div><strong>Under Review</strong></div> ';
                      }
                      ?>
                    </td>
                  </tr>


            <?php
              }
            }
            ?>
          </table>

            <div class="container">
              <div class="row">

                <button class="col-md-6" onclick="location.href='../jobs.php'">
                  <h2>Jobs</h2>
                </button>

                <button class="col-md-6" onclick="location.href='inbox.php'">
                  <h2>Mailbox</h2>
                </button>

              </div>
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
