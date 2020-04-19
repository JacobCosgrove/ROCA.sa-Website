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
  <title>LA Jobs</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
<div>

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <span class="logo-lg">LA Jobs</span>
    </a>

  </header>

  <div>

    <section>

                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>


                <ul class="nav nav-pills nav-stacked">
                  <li><a href="profile.php"> Edit Profile</a></li>
                  <li><a href="index.php"> My Applications</a></li>
                  <li class="active"><a href="inbox.php"> Mailbox</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>

          <form action="add-mail.php" method="post">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Message</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <select name="to" class="form-control">
                    <?php
                    $sql = "SELECT * FROM apply_job_post INNER JOIN company ON apply_job_post.id_company=company.id_company WHERE apply_job_post.id_user='$_SESSION[id_user]' AND apply_job_post.status='2'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id_company'].'">'.$row['companyname'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <input class="form-control" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>

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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

</body>
</html>
