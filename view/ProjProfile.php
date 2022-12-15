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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Profile.css">
    <title>Profile</title>

</head>

<div class="cook">
    <?php
        if (isset($_COOKIE[$_SESSION['Username']]))
        {
            echo "Last updated on : " . $_COOKIE[$_SESSION['Username']] ;
        }
    ?>
</div>

<div class="head">
<?php
    include "header.php";
?>
</div>

<body>
    <?php
        $user=$_SESSION['Username'];
        $handle = fopen("../model/profile.json", "r");
        $data = fread($handle, filesize("../model/profile.json"));
    ?>


    <?php

        $explode = explode("\n", $data);
    ?>


    <?php

        $arr = array();
        for ($i = 0; $i < count($explode)-1; $i++)
        {
            $json=json_decode(($explode[$i]));
            array_push($arr, $json);
        }
    ?>

    <?php
    $found="";
        for($i = 0;$i< count($arr); $i++)
            {
                if($user === $arr[$i]-> Username)  
                {
                    $found=$i;
                }

            }
    ?>

    <?php
        $_SESSION['index']=$found;
        $FirstName=$_SESSION['FirstName']=$arr[$found]-> FirstName;
        $LastName=$_SESSION['LastName']=$arr[$found]-> LastName;
        $Email=$_SESSION['Email']=$arr[$found]-> Email;
        $Gender=$_SESSION['Gender']=$arr[$found]-> Gender;
        $Religion=$_SESSION['Religion']=$arr[$found]-> Religion;
        $Phone=$_SESSION['Phone']=$arr[$found]-> Phone;
        $DoB=$_SESSION['DateOfBirth']=$arr[$found]-> DateOfBirth;
        $CurrentAddress=$_SESSION['CurrentAddress']=$arr[$found]-> CurrentAddress;
        $PermanentAddress=$_SESSION['PermanentAddress']=$arr[$found]-> PermanentAddress;
        $Question=$_SESSION['Question']=$arr[$found]-> Question;
        $Answer=$_SESSION['Answer']=$arr[$found]-> Answer;
    ?>

    <a class="link" href="ProjHomepage.php">HOME </a> || <a class="link" href="../controller/ProjLogOut.php"> Log Out </a>
    <br><br>
    <u><h3>PROFILE OF <?php echo strtoupper($_SESSION['Username'])?></h3></u>

    <?php
        echo "<h5>";
        echo "First Name : "." ".$FirstName;
        echo "<br><br>";
        echo "Last Name : "." ".$LastName;
        echo "<br><br>";
        echo "Gender : "." ".$Gender;
        echo "<br><br>";
        echo "Date of Birth : "." ".$DoB;
        echo "<br><br>";
        echo "Religion : "." ".$Religion;
        echo "<br><br>";
        echo "Contact Number : "." ".$Phone;
        echo "<br><br>";
        echo "Email : "." ".$Email;
        echo "<br><br>";
        echo "Present Address : "." ".$CurrentAddress;
        echo "<br><br>";
        echo "Permanent Address : "." ".$PermanentAddress;
        echo "<br><br>";
        echo "</h5>";

    ?>
    <a class="link" href="ProjProfileUpdate.php">Click here </a> <b>to update your profile.</b>

</body>
</html>