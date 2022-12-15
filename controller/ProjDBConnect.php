<?php
	$servername = "localhost";
	$CurrentUser = "root";
	$CurrentPass = "";
	$dbname = "pharmacy";

	$connection = new mysqli($servername, $CurrentUser, $CurrentPass, $dbname);
	if ($connection->connect_error)
		{
			die("Connection failed: " . $connection->connect_error);
		}
?>