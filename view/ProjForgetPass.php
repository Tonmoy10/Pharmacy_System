<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header(location:"../controller/Logout.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/ForgetPass.css">
    <title>Forget Password</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

</head>

<body>
    <form name = "ForgetPass" action="../controller/ProjForgetPassAction.php" method="POST" onsubmit="return isValidForgetPass(this);">

        <br><br><br>
        <center>
        <h3>Security Question : <?php echo $_SESSION['Question'];?></h3>
        <fieldset class="field" style= "width: 360px">
            <p><b>Answer : </b><input id="att" type="text" name="InputAnswer" placeholder=""></p>
            <br>
            <b>New Password : </b><input id="att" type="password" name="InputPassword" placeholder="">
            <br><br>
        </fieldset>
        <br>
        <button id="sub" type="Submit">Submit</button>
        </center> 
    </form>
    <center><p id="message"></p></center>
</body>
</html>