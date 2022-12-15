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
    <link rel="stylesheet" href="CSS/UpdateProfile.css">
    <title>Update Profile</title>
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

    <a class="link" href="ProjHomepage.php">HOME </a> || <a class="link" href="../controller/ProjLogOut.php"> Log Out </a>
    <h4>UPDATE Profile : </h4>


    <form name = "UpdateProfile" action="../controller/ProjProfileUpdateAction.php" method="POST" onsubmit="return isValidUpdateProf(this);">


        <h5>
        First Name : <input id="att" type="text" name="FirstName" value=<?php echo $_SESSION['FirstName'];?>>
        <br><br>
        Last Name : <input id="att" type="text" name="LastName" value=<?php echo $_SESSION['LastName'];?>>       
        <br><br>
        <div class="fix">
            Gender : <?php echo $_SESSION['Gender'];?>
        </div>

        <br><br>  
        Date of Birth : <input id="att" type="date" name="DateOfBirth" value=<?php echo $_SESSION['DateOfBirth']?>>
        <br><br>
        <div class="fix">
            Religion : <?php echo $_SESSION['Religion']?>
        </div>
        <br><br>
        <b>Present Address :</b>
            <br>
            <textarea id="att" name="CurrentAddress"><?php echo $_SESSION['CurrentAddress']?></textarea>
        <br><br>
        <b>Permanent Address : </b>
            <br>
            <textarea id="att" name= "PermanentAddress"><?php echo $_SESSION['PermanentAddress']?></textarea>
        <br><br>
        <b>Phone : </b><input id="att" type="tel" name="Phone" value=<?php echo $_SESSION['Phone']?> >
        <br><br>
        <b>Email : </b><input id="att" type="email" name="Email" value=<?php echo $_SESSION['Email']?>>
        <br><br>
        <input id="sub" type="submit" name="update" value="UPDATE">
    </form>
    <p id="message"></p>

</body>
</html>