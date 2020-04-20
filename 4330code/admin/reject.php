<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../database.php");

if(isset($_GET)) {

	//reject company and redirect to company page
	$sql = "UPDATE company SET active='0' WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: companies.php");
		exit();
	} else {
		echo "Error";
	}
}
