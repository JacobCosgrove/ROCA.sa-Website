<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage.
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Profile || LA Jobs</title>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <span class="logo-lg"><b>LA Jobs</b></span>
    </a>

  </header>

  <!-- Content Wrapper. Contains page content -->
  <div>

    <section>


                <h3>Welcome <b><?php echo $_SESSION['name']; ?></b></h3>


                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="edit-profile.php"> Edit Profile</a></li>
                  <li><a href="index.php"> My Applications</a></li>
                  <li><a href="../jobs.php"> Jobs</a></li>
                  <li><a href="mailbox.php"> Mailbox</a></li>
                  <li><a href="../logout.php"> Logout</a></li>
                </ul>
            <h2><i>Edit Profile</i></h2>
            <form action="edit-profile.php" method="post" enctype="multipart/form-data">
            <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>

                     <label for="fname">First Name</label>
                    <input type="text"  id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required=""><br>

                    <label for="lname">Last Name</label>
                    <input type="text"  id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required=""><br>

                    <label for="email">Email address</label>
                    <input type="email"  id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly><br>

                    <label for="address">Address</label>
                    <textarea id="address" name="address"  rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea><br>

                    <label for="city">City</label>
                    <input type="text"  id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city"><br>

                    <label for="state">State</label>
                    <input type="text"  id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>"><br>

                    <label for="contactno">Contact Number</label>
                    <input type="text"  id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>"><br>

                    <label for="qualification">Highest Qualification</label>
                    <input type="text"  id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>"><br>

                    <label for="stream">Stream</label>
                    <input type="text"  id="stream" name="stream" placeholder="stream" value="<?php echo $row['stream']; ?>"><br>

                    <label>Skills</label>
                    <textarea  rows="4" name="skills"><?php echo $row['skills']; ?></textarea><br>

                    <label>About Me</label>
                    <textarea  rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea><br>

                    <label>Upload/Change Resume</label>
                    <input type="file" name="resume" class="btn btn-default"><br>

                    <button type="submit" class="btn btn-flat btn-success">Update Profile</button>

              <?php
                }
              }
            ?>
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>

    </section>

</div>


</div>
<!-- ./wrapper -->

</body>
</html>
