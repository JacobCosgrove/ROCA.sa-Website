<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("database.php");

if(isset($_POST)) {

	//Escape Special Characters In String First
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

			//This variable is used to catch errors doing upload process. False means there is some error and we need to notify that user.
		$uploadOk = true;


		//If there is any error then redirect back.
		if($uploadOk == false) {
			header("Location: registercompany.php");
			exit();
		}

    $sql = "INSERT INTO company(name, companyname, country, state, city, contactno, website, email, password, aboutme) VALUES ('$name', '$companyname', '$country', '$state', '$city', '$contactno', '$website', '$email', '$password', '$aboutme')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully then Set some session variables for easy reference and redirect to company login
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();

		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: registercompany.php");
		exit();
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: registercompaany.php");
	exit();
}
