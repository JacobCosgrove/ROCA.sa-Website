<?php


session_start();
//check if logged in, if not redirect
if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");

if(isset($_POST)) {
	$to  = $_POST['to'];

  //add mail to database
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "INSERT INTO mailbox (id_fromuser, fromuser, id_touser, subject, message) VALUES ('$_SESSION[id_user]', 'user', '$to', '$subject', '$message')";

	if($conn->query($sql) == TRUE) {
		header("Location: inbox.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: inbox.php");
	exit();
}
