
<?php
    include "ProjDBConnect.php";

    $sql= "SELECT * FROM billinghistory WHERE OrderID= ?";

    $stmt=$connection->prepare($sql);
    $stmt->bind_param("s", $_GET['q']);
    $response = $stmt->execute();
    $table= array();
    if ($response)
    {
        $data=$stmt->get_result();
        
        if ($data->num_rows > 0)
        {
            while($row = $data->fetch_assoc()) {
            array_push($table, array('OrderID' => (string)$row["OrderID"],'Username' => $row["Username"] ,'MedicineCodes' => $row["MedicineCodes"], 'Quantities' => $row["Quantities"], 'GrandTotal' => (string)$row["GrandTotal"]));
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
        echo "Login Failed.";
    }
?>