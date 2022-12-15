<?php 
	if ($_SERVER["REQUEST_METHOD"] == 'POST')
	{
		$handle = fopen("../model/product.json", "r");
        $data = fread($handle, filesize("../model/product.json"));
        $explode = explode("\n", $data);
        $arr1 = array();
        for ($i = 0; $i < count($explode)-1; $i++)
        {
            $json=json_decode(($explode[$i]));
            array_push($arr1, $json);
        }

		$MedName=$_POST['MedName'];
 		$MedCode=$_POST['MedCode'];
 		$MedStock=$_POST['MedStock'];
 		$MedPrice=$_POST['MedPrice'];
 		$Expiry=$_POST['Expiry'];
 		$Submit=false;
 		$isValid=false;

		if(empty($MedName)||empty($MedStock)||empty($MedPrice)||empty($Expiry))
		{
			echo "Please fill up all the fields";
			$Submit=false;
 			$isValid=false;
		}
		else 
		{
			for($i = 0; $i < count($explode)-1; $i++)
            {
            	if($Expiry < date("Y/m/d"))
            	{
            		echo "Invalid expiry date!";
            		break;
            	}
                else if($MedCode === $arr1[$i]->MedicineCode)
                {
                	$Submit=false;
					$isValid = false;
					break;
					echo "Please fill up all the fields";
                }
                else
                {
					$Submit=true;
					$isValid = true;
                }
            }
			
		}

		function sanitize($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($isValid) 
		{

			$MedName=sanitize($MedName);
			$MedCode=sanitize($MedCode);
			$MedStock=sanitize($MedStock);
			$MedPrice=sanitize($MedPrice);
			$Expiry=sanitize($Expiry);
		}


		if ($isValid)
		{
			include "ProjDBConnect.php";
			$sql = "INSERT INTO medinfo(MedicineName, MedicineStock, MedicinePrice, ExpiryDate) VALUES (?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ssss", $MedName, $MedStock, $MedPrice, $Expiry);

			$response = $stmt->execute();

			if ($response) {
				echo "Data Inserted Succssfully";
				header("Location:../view/ProjHomepage.php");
			}
			else {
				echo "Error while saving";
			}

			$connection->close();
		}
	}
?>
<br><br><br>
<a href="../view/ProjManAddMed.php" >Back </a>