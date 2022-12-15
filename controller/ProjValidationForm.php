<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Submission Form</title>

</head>

<body>
	

	<?php 
		$FirstName=$_POST['FirstName'];
 		$LastName=$_POST['LastName'];
 		$Gender=$_POST['Gender'];
 		$DOB=$_POST['dateOfBirth'];
 		$Religion=$_POST['Religion'];
 		$Email=$_POST['Email'];
 		$Present=$_POST['CurrentAddress'];
 		$Permanent=$_POST['PermanentAddress'];
 		$Phone=$_POST['Phone'];
 		$Username=$_POST['Username'];
 		$Password=$_POST['Password'];
 		$Question=$_POST['Question'];
 		$Answer=$_POST['Answer'];
 		$Submit=false;

		if ($_SERVER["REQUEST_METHOD"] == 'POST')
		{

			if (empty($FirstName)||empty($LastName)||empty($_POST['Gender'])||empty($DOB)||empty($Religion)||empty($Email)||empty($Username)||empty($Password))
			{
				echo "Please fill up the form correctly!";
				$Submit=false;
				$isValid = false;
			}
			else 
			{
				
				echo "Submission Successful!";
				$Submit=true;
				$isValid = true;
			}
		}


	?>

	<?php

		function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($isValid) 
		{

			$FirstName=sanitize($FirstName);
			$LastName=sanitize($LastName);
			$Phone=sanitize($Phone);
			$Answer=sanitize($Answer);
			$Email=sanitize($Email);
			$Religion=sanitize($Religion);
			$Username=sanitize($Username);
			$Password=sanitize($Password);
		}
	?>

	<?php
		if ($isValid) 
		{ 
			$handle1 = fopen("../model/profile.json", "a");
			$arr = array('FirstName' => $FirstName, 'LastName' => $LastName, 'Gender' => $_POST['Gender'], 'DateOfBirth' => $DOB, 'Religion' => $Religion, 'CurrentAddress' => $Present, 'PermanentAddress' => $Permanent, 'Phone' => $Phone, 'Email' => $Email,'Username' => $Username, 'Password' => $Password, 'Question' => $Question, 'Answer' => $Answer);
			$val = json_encode($arr);

			$res = fwrite($handle1, $val . "\n");
		}
		else
		{
			$res=false;
		}

		if ($res and $Submit) {
			echo "<br>";
			echo "Information saved successully!";
		}
		else {
			echo "<br>";
			echo "Error while saving!";
		}
	?>

	<?php 
		if ($isValid)
		{
			include "ProjDBConnect.php";
			$sql = "INSERT INTO userinfo(FirstName, LastName, Gender, DOB, Religion, Question, Answer, PresentAddress, PermanentAddress, Phone, Email, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("sssssssssssss", $FirstName, $LastName, $Gender, $DOB, $Religion, $Question, $Answer ,$Present, $Permanent, $Phone, $Email, $Username, $Password);

			$response = $stmt->execute();

			if ($response) {
				echo "Data Inserted Succssfully";
			}
			else {
				echo "Error while saving";
			}

			$connection->close();
		}
	?>

	<br><br>

	<a href="../view/ProjRegistrationForm.php"> Register  </a> || <a href="../view/ProjLoginForm.php" >Login </a>

</body>
</html>