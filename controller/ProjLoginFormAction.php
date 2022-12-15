<?php
	if ($_SERVER["REQUEST_METHOD"] == 'POST') 
	{
			include "ProjDBConnect.php";
			$sql = "SELECT * FROM userinfo WHERE Username = ? and Password = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $Username, $Password);
			$Username = $_POST['Username'];
			$Password = $_POST['Password'];
			$response = $stmt->execute();

			if ($response) 
			{
				$data = $stmt->get_result();

				if ($data->num_rows > 0)
				{
					session_start();
					$_SESSION['Username']=$_POST['Username'];
					$_SESSION['Password']=$POST['Password'];
					header("Location:../view/ProjHomepage.php");
				}
				else 
				{
					echo "Login Failed.";
				}
			}

			$connection->close();
	}
?>
<br><br><br>
<a href="../view/ProjLoginForm.php" >Login </a>