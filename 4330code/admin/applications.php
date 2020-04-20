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
  <!-- DataTables -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
  <body>
    <div>

  <header>

    <a href="index.php" class="logo logo-bg-purple">
      <span class="logo-lg"><b>ROCA.sa</b></span>
    </a>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div>

    <section>
                <h3 class="box-title">Welcome <b>Admin</b></h3>
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="home.php"> Home</a></li>
                </ul>
                <h3>Candidates Database</h3>
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
                        <!-- table for displaying app info -->
                        <tbody>
                          <?php
                           $sql = "SELECT * FROM users";
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

                            <!-- query to get resume from encrypted file -->
                            
                            <?php if($row['resume'] != '') { ?>
                            <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                            <?php } else { ?>
                            <td>No Resume Uploaded</td>
                            <?php } ?>
                          </tr>

                          <?php

                            }
                          }
                          ?>

                        </tbody>
                      </table>
    </section>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Candidate Profile</h4>
            <button type="button">Close</button>


</div>
<!-- ./wrapper -->

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
