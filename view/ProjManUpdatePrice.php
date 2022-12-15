<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/UpdatePrice.css">
    <title>Update Price</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script> 
    $(document).ready(function(){
          $("#bt").click(function(){
            $(".price").slideToggle("slow");
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

    <form name = "UpdatePrice" action="../controller/ProjManUpdatePriceAction.php" method="POST" onsubmit="return isValidUpdatePrice(this);">

        <a id="att" href="ProjHomepage.php">HOME </a> || <a id="att" href="../controller/ProjLogOut.php"> Log Out </a>

        <fieldset style= "width: 360px">
            <legend><h4>UPDATE Price : </h4></legend>

            Medicine Code : <input id="medc" type="text" name="MedC">
            <br><br>
            Medicine Price : <input id="medp" type="text" name="MedP">
        </fieldset>
        <br>
    </form>
    <!-- <button type="button" onclick="UpdatePrice();">Update</button> -->

    <p id="message"></p>
    <?php
    include "JS/JSUpdatePrice.php";
    ?>
</body>
</html>
<div id="an">
<?php
    include "../controller/ProjMedTable.php";
?>
</div>