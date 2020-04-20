<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

//chekc if logged in, if not redirect
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <title>Mailbox | ROCA.sa</title>
  <style>
    #example1 {
      text-align: left;
    }
  </style>
</head>
<body>
    <div class="topnav">
      <b onclick="location.href='../index.php'">ROCA.sa</b>
      <a href="../logout.php">Logout</a>
      <a href="../user/index.php">Dashboard</a>
    </div>

    <h3><b><?php echo $_SESSION['name']; ?>'s Inbox</b></h3>




          <section>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 20px;"></h3>
              <div class="pull-right">
                <a href="create-mail.php" class="btn btn-warning btn-flat"><i class="fa fa-envelope"></i> Create</a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    //insert into table mail direct to this user
                    $sql = "SELECT * FROM mailbox WHERE id_fromuser='$_SESSION[id_user]' OR id_touser='$_SESSION[id_user]'";
                    $result = $conn->query($sql);
                    if($result->num_rows >  0 ){
                        while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td class="mailbox-subject"><a href="read-mail.php?id_mail=<?php echo $row['id_mailbox']; ?>"><?php echo $row['subject']; ?></a></td>
                    <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?></td>
                  </tr>
                  <?php
                      }
                    }
                  ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

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
