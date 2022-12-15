<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/UpdateStock.css">
    <title>Update Stock</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script> 
    $(document).ready(function(){
          $("#hide").click(function(){
            $(".st").slideToggle("slow");
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

    <form name = "UpdateStock" action="../controller/ProjManUpdateStockAction.php" method="POST" onsubmit="return isValidUpdateStock(this);">

        <a id="att" href="ProjHomepage.php">HOME </a> || <a id="att" href="../controller/ProjLogOut.php"> Log Out </a>

        <fieldset style= "width: 360px">
            <legend><center><h4>UPDATE Stock : </h4></center></legend>

            Medicine Code : <input id="medc" type="text" name="MedC">
            <br><br>
            New Stock : <input id="meds" type="text" name="NewS">
        </fieldset>
        <br>    
    </form>

    <p id="message"></p>
    <?php
    include "JS/JSUpdateStock.php";
    ?>
    
</body>
</html>
<?php
    include "../controller/ProjMedTable.php";
?>