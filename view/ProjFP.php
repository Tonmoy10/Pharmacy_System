<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/ForgetPass.css">
    <title>Login Form</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

</head>

<body>
    <form name = "FP" action="../controller/ProjFPAction.php" method="POST" onsubmit="return isValidFP(this);">
        <br><br><br>
        <center>
            <fieldset class="field" style= "width: 360px">
                <h3>Enter Your Username:</h3>
                <b>Username : </b><input id="att" type="text" name="Username" placeholder="">
                <br><br>
            </fieldset>
            <br>
            &emsp;<button id="sub" type="Submit">Submit</button>
        </center>
    </form>
    <center><p id="message"></p></center>
</body>
</html>