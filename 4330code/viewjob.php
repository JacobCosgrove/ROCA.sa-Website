<?php

session_start();
echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";

require_once("database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Job Post | ROCA.sa</title>
</head>
<body>
  <div class="topnav">
    <b onclick="location.href='index.php'">ROCA.sa</b>
    <a href="logout.php">Logout</a>
    <a href="user/index.php">Dashboard</a>
  </div>



  <div id="jobdisplay">

  <?php
    //query to find details about company and job post
    $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
  ?>
              <br>
              <button><a href="javascript:history.back()"> Back</a></button>

              <!-- display info that was fetched -->

              <h3><strong><?php echo $row['jobtitle']; ?></strong></h3>
              <h3><i><?php echo $row['companyname']; ?></i></h3>

              <p><span> <?php echo $row['city']; ?></span> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>


              <?php echo stripcslashes($row['description']); ?>

            <?php
            if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
              <button><a href="apply.php?id=<?php echo $row['id_jobpost']; ?>"> Apply</a></button>
              <button><a href=""> Report</a></button>
              <button><a href=""> Email</a></button>
            <?php } ?>


    <?php
      }
    }
    ?>
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>



</body>
</html>
