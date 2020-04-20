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
  <title>Applicant Details | ROCA.sa</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>
<div>

  <header>

    <!-- Logo -->
    <a href="index.php">
      <span><b>ROCA.sa</b></span>
    </a>
  </header>
<body>
<div>

    <section>

                <h3>Welcome <b>Admin</b></h3>

                <ul>
                  <li><a href="home.php"> Home</a></li>
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
                           <th>Delete</th>
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
                             <td><a href="reject.php?id=<?php echo $row['id_company']; ?>">Delete</a></td>
                           </tr>
                          <?php
                             }
                           }
                         ?>
                         </tbody>
                       </table>

    </section>
  </div>
  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>

  <script>
    $(function () {
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      });
    });
  </script>
</body>
</html>
