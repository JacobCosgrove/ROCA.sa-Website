<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}
require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Applicant Details | LA Jobs</title>

</head>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php">
      <span><b>LA Jobs</b></span>
    </a>
  </header>
<body>
<div>

    <section>

                <h3>Welcome <b>Admin</b></h3>

                <ul>
                  <li><a href="home.php"> Home</a></li>
                  <li><a href="active-jobs.php"> Active Jobs</a></li>
                  <li><a href="applications.php"> Applicants</a></li>
                  <li class="active"><a href="companies.php"> Companies</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>


            <h3>Companies</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Company Name</th>
                      <th>Account Creator Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM company";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td>
                        <?php
                          if($row['active'] == '1') {
                            echo "Activated";
                          } else if($row['active'] == '2') {
                            ?>
                            <a href="reject.php?id=<?php echo $row['id_company']; ?>">Reject</a> <a href="approve.php?id=<?php echo $row['id_company']; ?>">Approve</a>
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="approve.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo "Rejected";
                          }
                        ?>
                        </td>
                     <?php
                        }
                      }
                    ?>
                    </tbody>
                  </table>

    </section>
  </div>

</body>
</html>
