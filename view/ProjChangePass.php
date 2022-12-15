<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header(location:"../controller/ProjLogOut.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/ChangePass.css">
    <title>Change Password</title>
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

    <a id="top" href="ProjHomepage.php">HOME </a> || <a id="top" href="../controller/ProjLogOut.php"> Log Out </a>
    <br><br><br>
    <center><u><h1>Change Password</h1></u></center>
    <br>


    <form name = "ChangePass" action="../controller/ProjChangePassAction.php" method="POST" onsubmit="return isValidChangePass(this);">

        
        <center>
            <fieldset class="field" style= "width: 360px">
                <br>
                <b>Current Password : </b><input id="att" type="password" name="CurrentPass" placeholder="">
                <br><br><br>
                <b>New Password : </b><input id="att" type="password" name="NewPass" placeholder="">
                <br><br><br>
                <b>Confirm Password : </b><input id="att" type="password" name="Confirm" placeholder="">
                <br><br>
            </fieldset>
            <br>
            <button id="sub" type="Submit">Update</button>
        </center>

        
    </form>
    <center><p id="message"></p></center>
</body>
</html>