<?php
	include "ProjDBConnect.php";
	$sql = "SELECT * FROM medinfo WHERE MedicineCode = (SELECT max(MedicineCOde) FROM medinfo)";
	$stmt = $connection->prepare($sql);

	$data = $connection->query($sql);

	if ($data->num_rows>0)
	{
		while($row = $data->fetch_assoc())
		{
			$temp= $row["MedicineCode"];
			echo $temp + 1;
		}
	}
?>