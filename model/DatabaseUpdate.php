<style>
        table, th, td
    {
        border: 1px solid black;
    }
</style>
<?php

    include "ProjDBConnect.php";

    $sq = "UPDATE `medinfo` SET `MedicinePrice`=? WHERE `MedicineCode` = ?";

    $stm = $connection->prepare($sq);
    $stm->bind_param("ss", $_GET["MedicinePrice"], $_GET["MedicineCode"]);

    $resp = $stm->execute();


    $connection->close();


    include "ProjDBConnect.php";

    $sql= "SELECT * FROM medinfo";

    $stmt=$connection->prepare($sql);
    //$stmt->bind_param("s", $_GET['MedicineCode']);
    $response = $stmt->execute();
    //$table= array();
    if ($response)
    {
        $data=$stmt->get_result();
        if ($data->num_rows > 0)
        {
            echo "<table>";
            echo "<tr>";
            echo "<th>MedicineName</th>";
            echo "<th>MedicineCode</th>";
            echo "<th>MedicineStock</th>";
            echo "<th>MedicinePrice</th>";
            echo "<th>ExpiryDate</th>";
            echo "</tr>";
            while($row = $data->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MedicineName"] . "</td>";
                echo "<td>" . $row["MedicineCode"] . "</td>";
                echo "<td>" . $row["MedicineStock"] . "</td>";
                echo "<td>" . $row["MedicinePrice"] . "</td>";
                echo "<td>" . $row["ExpiryDate"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    // if ($MedicineCode===NULL) {
    //     echo "Not Found";
    // }
    // else
    // {
    // echo "<table>";
    // echo "<tr>";
    // echo "<th>MedicineName</th>";
    // echo "<th>MedicineCode</th>";
    // echo "<th>MedicineStock</th>";
    // echo "<th>MedicinePrice</th>";
    // echo "<th>ExpiryDate</th>";
    // echo "</tr>";
    // echo "<tr>";
    // echo "<td>" . $MedicineName . "</td>";
    // echo "<td>" . $MedicineCode . "</td>";
    // echo "<td>" . $MedicineStock . "</td>";
    // echo "<td>" . $MedicinePrice . "</td>";
    // echo "<td>" . $ExpiryDate . "</td>";
    // echo "</tr>";
    // echo "</table>";
    // }
?>
