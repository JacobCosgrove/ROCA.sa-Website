
<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");


//handling the differnt queries for type of mail you can recieve
$sql = "SELECT * FROM mailbox WHERE id_mailbox='$_GET[id_mail]' AND (id_fromuser='$_SESSION[id_company]' OR id_touser='$_SESSION[id_company]')";
$result = $conn->query($sql);
if($result->num_rows >  0 ){
  $row = $result->fetch_assoc();
  if($row['fromuser'] == "company") {
    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_fromuser]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows >  0 ){
      $rowCompany = $result1->fetch_assoc();
    }
    $sql2 = "SELECT * FROM users WHERE id_user='$row[id_touser]'";
    $result2 = $conn->query($sql2);
    if($result2->num_rows >  0 ){
      $rowUser = $result2->fetch_assoc();
    }
  } else {
    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_touser]'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows >  0 ){
      $rowCompany = $result1->fetch_assoc();
    }
    $sql2 = "SELECT * FROM users WHERE id_user='$row[id_fromuser]'";
    $result2 = $conn->query($sql2);
    if($result2->num_rows >  0 ){
      $rowUser = $result2->fetch_assoc();
    }
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Read Mail | Company</title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 150 });</script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <div class= "topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="index.php">Dashboard</a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"> Dashboard</a></li>
                </ul>

          <div class="col-md-9 bg-white padding-2">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <a href="mailbox.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
                <div class="box box-primary">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                      <h3><?php echo $row['subject']; ?></h3>
                      <h5>From: <?php echo $rowCompany['companyname']; ?>
                        <span class="mailbox-read-time pull-right"><?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?></span></h5>
                    </div>
                    <div class="mailbox-read-message">
                      <?php echo stripcslashes($row['message']); ?>
                    </div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.box-body -->
                </div>

                <?php
                //getting info from selected mail to display
                $sqlReply = "SELECT * FROM reply_mailbox WHERE id_mailbox='$_GET[id_mail]'";
                $resultReply = $conn->query($sqlReply);
                if($resultReply->num_rows > 0) {
                  while($rowReply =  $resultReply->fetch_assoc()) {
                    ?>
                  <div class="box box-primary">
                    <div class="box-body no-padding">
                      <div class="mailbox-read-info">
                        <h3>Reply Message</h3>
                        <h5>From: <?php if($rowReply['usertype'] == "company") { echo $rowCompany['companyname']; } else { echo $rowUser['firstname']; } ?>
                          <span class="mailbox-read-time pull-right"><?php echo date("d-M-Y h:i a", strtotime($rowReply['createdAt'])); ?></span></h5>
                      </div>
                      <div class="mailbox-read-message">
                        <?php echo stripcslashes($rowReply['message']); ?>
                      </div>
                    </div>
                  </div>
                    <?php
                  }
                }
                ?>


                <div class="box box-primary">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                      <h3>Send Reply</h3>
                    </div>
                    <div class="mailbox-read-message">
                      <form action="reply-mailbox.php" method="post">
                        <div class="form-group">
                          <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                          <input type="hidden" name="id_mail" value="<?php echo $_GET['id_mail']; ?>">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-success">Reply</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.box-body -->
                </div>


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
