<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage.
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
  <title>Edit Company Details | ROCA.sa</title>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header>

    <a href="index.php">

      <span class="logo-lg"><b>ROCA.sa</b></span>
    </a>

  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">

                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"> Dashboard</a></li>
                </ul>

            <h2><i>My Company</i></h2>
            <p>In this section you can change your company details</p>
              <form action="update-company.php" method="post" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                     <label>Company Name</label>
                    <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">

                     <label>Website</label>
                    <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">

                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>

                    <label>About Me</label>
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>

                    <button type="submit" class="btn btn-flat btn-success">Update Company Profile</button>
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">

                    <label for="city">City</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">

                    <label for="state">State</label>
                    <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">

                    <label>Change Company Logo</label>
                    <input type="file" name="image" class="btn btn-default">
                    <?php if($row['logo'] != "") { ?>
                    <img src="../uploads/logo/<?php echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>

                    <?php
                    }
                  }
                ?>
              </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>

                <?php echo $_SESSION['uploadError']; ?>

            <?php unset($_SESSION['uploadError']); } ?>

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
</body>
</html>
