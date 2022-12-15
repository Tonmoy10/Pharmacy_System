
<style>
        table, th, td 
        {
            border: 1px solid black;
        }
</style>
        <?php
        	include "ProjDBConnect.php";
            $sql = "SELECT * FROM medinfo";
            $stmt = $connection->prepare($sql);
            $response = $stmt->execute();

            if ($response)
            {
            	$data = $stmt->get_result();
            	echo " <table>
	            <tr>
	            <th>MedicineName</th>
	            <th>MedicineCode</th>
	            <th>MedicineStock</th>
	            <th>MedicinePrice</th>
	            <th>ExpiryDate</th>

	            </tr>
	            ";
	            while ($row = $data->fetch_assoc())
				{
				$MedicineName=$row["MedicineName"];
				$MedicineCode=$row["MedicineCode"];
				$MedicineStock=$row["MedicineStock"];
				$MedicinePrice=$row["MedicinePrice"];
				$ExpiryDate=$row["ExpiryDate"];
				echo "
				<tr>
				<td>$MedicineName</td>
				<td>$MedicineCode</td>
				<td>$MedicineStock</td>
				<td>$MedicinePrice</td>
				<td>$ExpiryDate</td>
				</tr>
				";



				}
				echo "<br><br>";
				echo "</table>";
            }
            else
            {
            	echo "Not Found!";
            }
        ?>