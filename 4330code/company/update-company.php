<?php

//To Handle Session Variables on This Page
session_start();

//checked if logged in, if not redirect
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../database.php");

//only update if user pressed button
if(isset($_POST)) {

	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);





	//Update User Details Query
	$sql = "UPDATE company SET companyname='$companyname', website='$website', city='$city', state='$state', contactno='$contactno', aboutme='$aboutme'";


	$sql = $sql . " WHERE id_company='$_SESSION[id_company]'";

	if($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $companyname;
		//If data Updated successfully then redirect to dashboard
		header("Location: index.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: edit-company.php");
	exit();
}
