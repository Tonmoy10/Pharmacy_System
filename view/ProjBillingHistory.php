<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/ViewHistory.css">
    <title>Product List</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script> 
    $(document).ready(function(){
          $("#hide").click(function(){
            $(".search").slideToggle("slow");
          });
        });
    </script>

</head>

<div class="head">
<?php
    include "header.php";
?>
</div>

<body>
    <a id="att" href="ProjHomepage.php">HOME </a> || <a id="att" href="../controller/ProjLogOut.php"> Log Out </a>

        <h1>Order History</h1>
        <form>
            Search : <input id="ss" type="text" name="search" placeholder="by code">
        </form>

    <?php
    include "JS/JSHistory.php";
    ?>
    <form>
        <br><br><br>
        <h3>Total History</h3>
    </form>
</body>
</html>
<style>
        table, th, td
    {
        border: 1px solid black;
    }
    </style>
    <?php
        include "../controller/ProjDBConnect.php";

        $sql= "SELECT * FROM billinghistory";
        
        $stmt=$connection->prepare($sql);
        $response = $stmt->execute();

        if ($response)
        {
            $data=$stmt->get_result();
            echo "<table>
                <tr>
                <th>OrderID</th>
                <th>Username</th>
                <th>MedicineCodes</th>
                <th>Quantities</th>
                <th>GrandTotal</th>
                </tr>
                ";
            while ($row = $data->fetch_assoc())
            {
                $OrderID=$row["OrderID"];
                $username=$row["Username"];
                $codes=$row["MedicineCodes"];
                $quantities=$row["Quantities"];
                $grand=$row["GrandTotal"];
                echo "
                <tr>
                <td>$OrderID</td>
                <td>$username</td>
                <td>$codes</td>
                <td>$quantities</td>
                <td>$grand</td>
                </tr>
                ";

            }
            echo "<br><br>";
            echo "</table>";
        }

        else
        {
            echo "not found";
            header("Location:ProjHomepage.php");
        }
    ?>