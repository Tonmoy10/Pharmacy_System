<?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            include "ProjDBConnect.php";
            $sql = "SELECT * FROM medinfo WHERE MedicineCode = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $Code);
            $Code = $_POST['MedC'];
            $response = $stmt->execute();

            if (empty($_POST['MedC'])||empty($_POST['NewS']))
            {
                echo "Please fill up everything!";
            }
            else if ($response) 
            {
                $data = $stmt->get_result();

                if ($data->num_rows > 0)
                {
                    include "ProjDBConnect.php";
                    $sq = "UPDATE `medinfo` SET `MedicineStock`=? WHERE `MedicineCode` = ?";
                    $stm = $connection->prepare($sq);
                    $stm->bind_param("ss", $news, $medc);
                    $news = $_POST['NewS'];
                    $medc = $Code;

                    $resp = $stm->execute();

                    if ($resp) 
                    {
                        header("location: ../view/ProjManUpdateStock.php");
                    }
                    else 
                    {
                        echo "Error while saving";
                    }

                    $connection->close();
                }
            }
        }
        else 
        {
            echo "Invalid Code!";
        }
?>
<br><br><br>
<a href="../view/ProjManUpdateStock.php" >Back </a>