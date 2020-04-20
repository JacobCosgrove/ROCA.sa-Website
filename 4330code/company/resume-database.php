<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//check if logged in, if not redirect
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
  <title>Resume Database | ROCA.sa</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <style>
    #example2 {
      text-align: left;
    }
  </style>
</head>
<div class="topnav">
  <b onclick="location.href='../index.php'">ROCA.sa</b>
  <a href="../logout.php">Logout</a>
  <a href="../company/index.php">Dashboard</a>
</div>

    <div id="candidates" class="content-header">

        <!-- talbe to show all applications to all your jobs -->

            <h2><i>Applicant Database</i></h2>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Candidate</th>
                      <th>Highest Qualification</th>
                      <th>Skills</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Download Resume</th>
                    </thead>
                    <tbody>
                    <?php
                    // triple inner join to get info from job post and users who applied

                       $sql = "SELECT users.* FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc())
                              {

                                $skills = $row['skills'];
                                $skills = explode(',', $skills);
                      ?>
                      <tr>
                        <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td>
                          <?php
                          foreach ($skills as $value) {
                            echo ' <span class="label label-success">'.$value.'</span>';
                          }
                          ?>
                        </td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>

                        <!-- download resume from encrypted folder -->

                        <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><i class="fa fa-file-pdf-o">Resume</i></a></td>
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

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<!-- basic script to create table -->
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
