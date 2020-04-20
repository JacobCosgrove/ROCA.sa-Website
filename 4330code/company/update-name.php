<?php

//To Handle Session Variables on This Page
session_start();

//check if logged in, if not redirect
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");

//If user Actually clicked login button
if(isset($_POST)) {

	//Escape Special Characters in String
	$name = mysqli_real_escape_string($conn, $_POST['name']);

	//sql query to check user login
	$sql = "UPDATE company SET name='$name' WHERE id_company='$_SESSION[id_company]'";
	if($conn->query($sql) === true) {
		header("Location: index.php");
		exit();
	} else {
		echo $conn->error;
	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: settings.php");
	exit();
}
