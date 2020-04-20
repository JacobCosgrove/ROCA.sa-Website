<?php

session_start();

//check if logged in, redirect if not
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}


require_once("../database.php");

//reject user application

$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0)
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE apply_job_post SET status='1' WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {
	header("Location: job-applications.php");
	exit();
}

?>
