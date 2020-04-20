<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../database.php");

if(isset($_GET)) {

	//Approve company then redirect to company page
	$sql = "UPDATE company SET active='1' WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: companies.php");
		exit();
	} else {
		echo "Error";
	}
}
