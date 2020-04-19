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
  <title>Applicant Details | LA Jobs</title>

</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg-purple">
      <span class="logo-lg"><b>LA Jobs</b></span>
    </a>
  </header>
  <div>

                <h3>Welcome <b>Admin</b></h3>
              </div>
              <div>
                <ul>
                  <li><a href="home.php"> Home</a></li>
                  <li class="active"><a href="active-jobs.php"> Active Jobs</a></li>
                  <li><a href="applications.php"> Applicants</a></li>
                  <li><a href="companies.php"> Companies</a></li>
                  <li><a href="../logout.php"> Logout</a></li>


            <h3>Active Job Posts</h3>

                  <table>
                    <thead>
                      <th>Job Name</th>
                      <th>Company Name</th>
                      <th>Date Created</th>
                      <th>View</th>
                    </thead>
                    <tbody>
                      <?php
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
                        <td><a href="view.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
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
