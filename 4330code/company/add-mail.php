<?php


session_start();

if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");
//allows us to enter and save messages to the database for later access (reply/read)
if(isset($_POST)) {
	$to  = $_POST['to'];

	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "INSERT INTO mailbox (id_fromuser, fromuser, id_touser, subject, message) VALUES ('$_SESSION[id_company]', 'company', '$to', '$subject', '$message')";
//redirect us after message has be inserted into table
	if($conn->query($sql) == TRUE) {
		header("Location: mailbox.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: mailbox.php");
	exit();
}
