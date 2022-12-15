<?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        include "ProjDBConnect.php";
            $sql = "SELECT * FROM medinfo WHERE MedicineCode = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $Code);
            $Code = $_POST['MedC'];
            $response = $stmt->execute();

            
        if (empty($_POST['MedC'])||empty($_POST['MedP']))
        {
            echo "Please fill up everything!";
        }
        else if ($response) 
        {
            $data = $stmt->get_result();

            if ($data->num_rows > 0)
            {
                include "ProjDBConnect.php";
                $sq = "UPDATE `medinfo` SET `MedicinePrice`=? WHERE `MedicineCode` = ?";
                $stm = $connection->prepare($sq);
                $stm->bind_param("ss", $medp, $medc);
                $medp = $_POST['MedP'];
                $medc = $Code;

                $resp = $stm->execute();

                if ($resp) 
                {
                    //header("location: ../view/ProjManUpdatePrice.php");
                }
                else 
                {
                    echo "Error while saving";
                }

                $connection->close();
            }
        }
        else 
        {
            echo "Invalid Code!";
        }
    }
?>
<br><br><br>
<a href="../view/ProjManUpdatePrice.php" >Back </a>