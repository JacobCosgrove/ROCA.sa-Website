<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>View Job Post | VetBosSel</title>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php">
      <span class="logo-lg"><b>LA Jobs</b></span>
    </a>
  </header>



  <div>

  <?php

    $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
  ?>

    <section>


              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>


              <a href="jobs.php"> Back</a>


              <p><span> <?php echo $row['city']; ?></span> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>


              <?php echo stripcslashes($row['description']); ?>

            <?php
            if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
            <div>
              <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
            </div>
            <?php } ?>




              <img src="uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">

                <h3><?php echo $row['companyname']; ?></h3>
                <p><a href="#" role="button">More Info</a>


                  <div><a href=""> Apply</a></div>
                  <div><a href=""> Report</a></div>
                  <div><a href=""> Email</a></div>

    </section>

    <?php
      }
    }
    ?>
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>



</body>
</html>
