<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: ../index.php");
  exit();
}


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../database.php");



$sql1 = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
$result1 = $conn->query($sql1);
if($result1->num_rows > 0)
{
  $row = $result1->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Job Post | LA Jobs</title>
</head>
<body>
<div>
  <header>

    <a href="index.php">
      <span><b>LA Jobs</b></span></a>
  </header>
    <section>
              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
              <a href="active-jobs.php"> Back</a>
              <p><span class="margin-right-10"><?php echo $row['city']; ?></span> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>
              <?php echo stripcslashes($row['description']); ?>
              <img src="../uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
              <h3><?php echo $row['companyname']; ?></h3>
    </section>
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
