<?php

session_start();

require_once("../database.php");

//check if correct path was used to access page
if(isset($_POST)) {

	//Escape Special Characters in String
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//query to check user login
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);

	//if user table has this this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {

			//Set some session variables for easy reference
			$_SESSION['id_admin'] = $row['id_admin'];
			header("Location: home.php");
			exit();
		}

		//If there is an issue direct them to login
 	} else {
 		$_SESSION['loginError'] = true;
 		header("Location: index.php");
		exit();
 	}

 	$conn->close();

} else {
	header("Location: index.php");
	exit();
}
