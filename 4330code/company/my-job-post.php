<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//check if logged in, if not redirect to index
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
  <title>Job Post | ROCA.sa</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <style>
    #example2 {
      text-align: left;
    }
  </style>
</head>
<body>
  <!-- nav bar with redirct links -->
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 5px;">
          <div class="col-md-9 bg-white padding-2">
            <h2><i>My Job Posts</i></h2>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Job Title</th>
                      <th>Date Posted</th>
                    </thead>
                    <tbody>
                    <?php
                    //query to find jobs tied to this company
                     $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);

                      //If Job Post exists then display details of post
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc())
                        {
                      ?>
                      <tr>
                        <td>
                          <!-- create a link tied to job post and display in the table as job title -->
                          <a href="../viewjob.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a>
                        </td>
                        <td>
                          <a><?php echo $row['createdat']; ?></a>
                        </td>
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
