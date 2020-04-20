<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}
require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Applicant Details | ROCA.sa</title>

</head>
<body>
<div class="wrapper">

  <header class="main-header">

    <a href="index.php" class="logo logo-bg-purple">
      <span class="logo-lg"><b>ROCA.sa</b></span>
    </a>
  </header>
  <div>

                <h3>Welcome <b>Admin</b></h3>
              </div>
              <div>
                <ul>
                  <li><a href="home.php"> Home</a></li>

                  <!-- display active jobs -->
                  <h3>Active Job Posts</h3>
                                <div class="row margin-top-20">
                                  <div class="col-md-12">
                                    <div class="box-body table-responsive no-padding">
                                      <table id="example2" class="table table-hover">
                                        <thead>
                                          <th>Job Name</th>
                                          <th>Company Name</th>
                                          <th>Date Created</th>
                                          <th>View</th>
                                          <th>Delete</th>
                                        </thead>
                                        <tbody>
                                          <?php
                                          //query to display job related info
                                          $sql = "SELECT job_post.*, company.companyname FROM job_post INNER JOIN company ON job_post.id_company=company.id_company";
                                          $result = $conn->query($sql);
                                          if($result->num_rows > 0) {
                                            $i = 0;
                                            while($row = $result->fetch_assoc()) {
                                          ?>
                                          <tr>
                                            <td><?php echo $row['jobtitle']; ?></td>
                                            <td><?php echo $row['companyname']; ?></td>
                                            <td><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></td>
                                            <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i></i></a></td>
                                          </tr>
                                                <?php
                                            }
                                          }
                                        ?>
                                        </tbody>
                                      </table>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Job Title</h4>
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

</div>


</body>
</html>
