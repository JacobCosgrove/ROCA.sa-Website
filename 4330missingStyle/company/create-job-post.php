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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create Job Post | LA Jobs</title>

  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 300 });</script>
</head>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <span class="logo-lg"><b>LA Jobs</b></span>
    </a>
  </header>


  <div>

    <section>
                <h3>Welcome <b><?php echo $_SESSION['name']; ?></b></h3>

                <ul>
                  <li><a href="index.php"> Dashboard</a></li>
                  <li><a href="edit-company.php"> My Company</a></li>
                  <li class="active"><a href="create-job-post.php"> Create Job Post</a></li>
                  <li><a href="my-job-post.php"> My Job Post</a></li>
                  <li><a href="job-applications.php"> Job Application</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="resume-database.php"> Resume Database</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>
            <h2><i>Create Job Post</i></h2>
              <form method="post" action="addpost.php">

                    <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">

                    <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>

                    <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">

                    <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" required="">

                <input type="number" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" placeholder="Experience (in Years) Required" required="">

                    <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Qualification Required" required="">

                    <button type="submit" class="btn btn-flat btn-success">Create</button>
              </form>
    </section>
</div>
<!-- ./wrapper -->

</body>
</html>