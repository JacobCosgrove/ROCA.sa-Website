<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage.
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Job Post | LA Jobs</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php">
      <span><b>LA Jobs</b></span>
    </a>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul>
                  <li><a href="index.php"> Dashboard</a></li>
                  <li><a href="edit-company.php"> My Company</a></li>
                  <li><a href="create-job-post.php"> Create Job Post</a></li>
                  <li class="active"><a href="my-job-post.php"> My Job Post</a></li>
                  <li><a href="job-applications.php"> Job Application</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="resume-database.php"> Resume Database</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>My Job Posts</i></h2>
            <p>In this section you can view all job posts created by you.</p>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Job Title</th>
                      <th>View</th>
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);

                      //If Job Post exists then display details of post
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc())
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['jobtitle']; ?></td>
                        <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                      </tr>
                      <?php
                       }
                     }
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
    </section>




  </div>
<!-- ./wrapper -->
</div>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
