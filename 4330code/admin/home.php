<?php

session_start();

//check if admin is logged in
if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>

</head>

    <a href="../index.php">
      <span class="logo-lg"><b>Home</b></span>
    </a>

  <div>

    <section>
                <h3 class="box-title">Welcome <b>Admin</b></h3>

                <ul class="nav nav-pills nav-stacked">
                  <li><a href="active-jobs.php"> Active Jobs</a></li>
                  <li><a href="applications.php"> Applicants</a></li>
                  <li><a href="companies.php"> Companies</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>
    </section>

</div>


</body>
</html>
