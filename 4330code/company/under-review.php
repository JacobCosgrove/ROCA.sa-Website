<?php

//To Handle Session Variables on This Page
session_start();

//check if logged in, if not redirect
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");

//selecting the user that is to be updated with new status
$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0)
{
  header("Location: index.php");
  exit();
}

//update user in database with new status
$sql = "UPDATE apply_job_post SET status='2' WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {
	header("Location: job-applications.php");
	exit();
}

?>
