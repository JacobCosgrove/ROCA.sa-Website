<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");


if(isset($_POST)) {

	$sql = "SELECT * FROM cities WHERE state_id='$_POST[id]'";
	$result = $conn->query($sql);


	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {

			echo '<option value="'.$row["name"].'" data-id="'.$row["id"].'">'.$row["name"].'</option>';

			}

	}
 	
 	$conn->close();

}
