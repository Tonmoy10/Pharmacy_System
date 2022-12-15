<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/AddMed.css">
    <title>Add Medicine</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

</head>

<div class="head">
<?php
    include "header.php";
?>
</div>

<body>

    <form  id="tab" name = "AddMed" action="../controller/ProjMedValidation.php" method="POST" onsubmit="return isValidMed(this);">

        <a href="ProjHomepage.php">HOME </a> || <a href="../controller/ProjLogOut.php"> Log Out </a>
        <br><br>

        <center>
            <fieldset style= "width: 360px">

                <legend><b><h3>Medicine Information</h3></b></legend>
                    <p><b>Medicine Name : </b><input id="att" type="text" name="MedName" placeholder=""></p>
                    <p><b>Medicine Code : </b><input id="att" type="text" name="MedCode" value= <?php include "../controller/ProjIDDisplay.php";?> readonly></p>
                    <p><b>Medicine Stock : </b><input id="att" type="text" name="MedStock" placeholder=""></p>
                    <p><b>Medicine Price : </b><input id="att" type="text" name="MedPrice" placeholder=""></p>
                    <p><b>Expiry Date : </b><input id="att" type="date" name="Expiry" Placeholder=""></p>
            </fieldset>
            <br>
            <button id="sub" type="Submit">Submit</button> 
            <br>
        </center>
    </form>
    <center><p id="message"></p></center>
</body>
</html>