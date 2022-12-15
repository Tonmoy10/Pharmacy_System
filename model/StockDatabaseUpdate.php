<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header(location:"../controller/Logout.php");
    }
?>
<?php 

    include "ProjDBConnect.php";

    $sq = "UPDATE `medinfo` SET `MedicineStock`=? WHERE `MedicineCode` = ?";

    $stm = $connection->prepare($sq);
    $stm->bind_param("ss", $_GET["MedicineStock"], $_GET["MedicineCode"]);

    $resp = $stm->execute();

    $connection->close();


    include "ProjDBConnect.php";
    $sql= "SELECT * FROM medinfo where MedicineCode=?";

    $stmt=$connection->prepare($sql);
    $stmt->bind_param("s", $_GET['MedicineCode']);
    $response = $stmt->execute();
    $table= array();
    if ($response)
    {
        $data=$stmt->get_result();
        
        if ($data->num_rows > 0)
        {
            while($row = $data->fetch_assoc()) {
            array_push($table, array('MedicineName' => $row["MedicineName"],'MedicineCode' => (string)$row["MedicineCode"] ,'MedicineStock' => (string)$row["MedicineStock"], 'MedicinePrice' => (string)$row["MedicinePrice"], 'ExpiryDate' => $row["ExpiryDate"]));
               if ($row["MedicineCode"]===NULL)
                {
                    echo "Error!!";
                }
            echo json_encode($table);
            }
        }
        else
        {
            echo "error";
        }
    }
    else 
    {
        echo "Error.";
    }

?>