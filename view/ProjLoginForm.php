<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Login.css">
    <title>Login Form</title>
    <style>
        #message {
            color: orangered;
        }
    </style>
    <script src="JS/JSValidation.js"></script>

</head>

<body>

	

	<br><br><br><br><br><br>
    <u><h1><div id="head">Login Information</div></h1></u>
    <center>
        <fieldset class="field" style= "width: 360px">
            <form name = "Login" action="../controller/ProjLoginFormAction.php" method="POST" onsubmit="return isValidLogin(this);">
                <br>
                Username: <input id="att" type="text" name="Username">
                <br><br>
                Password: <input id="att" type="Password" name="Password">
                <br><br>
        </fieldset>
            <br>
            <input id="sub" type="submit" name="Login" value="Login">
    </center>
        </form>
        <center><p id="message"></p></center>
	<br>
	<center>Not registered yet? <a class="link" href="ProjRegistrationForm.php"> Click here </a> for registration.</center>
	<br>
	<center>Forgot Password? <a class="link" href="ProjFP.php"> Click here </a></center>

</body>
</html>