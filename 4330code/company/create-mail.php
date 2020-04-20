<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='../home-style.css' />";

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
  <title>Create Mail | ROCA.sa</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <!-- give the recruiter a text box for job desc. -->
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 150 });</script>

</head>
<!-- nav bar for redirection -->
<body>
  <div class="topnav">
    <b onclick="location.href='../index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="../company/index.php">Dashboard</a>
  </div>

    <section>
        <!-- give fields for recruiter to make mail only to job applicants -->
          <form action="add-mail.php" method="post">
                <h3 class="box-title">Compose New Message</h3>
                  <select name="to" class="form-control">
                    <?php
                    $sql = "SELECT * FROM apply_job_post INNER JOIN users ON apply_job_post.id_user=users.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' AND apply_job_post.status='2'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id_user'].'">'.$row['firstname'].' '.$row['lastname'].'</option>';
                      }
                    }
                    ?>
                  </select>
                  <input class="form-control" name="subject" placeholder="Subject:">
                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                  <button type="submit">Send</button>
                <!-- if discarded return to mailbox -->
                <a href="mailbox.php" Discard</a>
          </form>
    </section>

  </div>

</div>



<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
  })
</script>

</body>
</html>
