<?php

session_start();

//check if logged in, if not redirect
require_once("database.php");

if(isset($_POST)) {

	//get info from company register
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);

	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	//sql query to check if email already exists or not
	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);

	//if email not found then we can insert new data
	if($result->num_rows == 0) {

    $sql = "INSERT INTO company(name, companyname, country, state, city, contactno, website, email, password, aboutme) VALUES ('$name', '$companyname', '$country', '$state', '$city', '$contactno', '$website', '$email', '$password', '$aboutme')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully set vari for easy reference
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();

		} else {
			//sql inject protection hopefully
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//email exists already
		$_SESSION['registerError'] = true;
		header("Location: registercompany.php");
		exit();
	}

	//Close database connection
	$conn->close();

} else {
	//redirect if didnt access page properly
	header("Location: registercompaany.php");
	exit();
}
