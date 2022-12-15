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
    <link rel="stylesheet" href="CSS/Home.css">
    <title>HOMEPAGE</title>
    <script src="JS/JSPop.js"></script>

</head>
<div class="head">
<?php
    include "header.php";
?>
</div>

<body>

    <u><h3>Welcome back, <?php echo $_SESSION['Username'] ?></h3></u>
    <a id="lg" href="../controller/ProjLogOut.php" onclick="return popup();"> Log Out </a>
    <br><br><br><br>
        <center>
            <b><u><h1>Available Actions</h1></u></b>
            <br><br><br>
            <a id="att" href="ProjChangePass.php"> Change Password </a>&emsp;&emsp;&emsp;&emsp;
            <a id="att" href="ProjProfile.php"> View Profile </a>&emsp;&emsp;&emsp;&emsp;
            <a id="att" href="ProjManAddMed.php"> Add Medicine </a>
        </center>
        <center>
            <br><br><br><br>
            &emsp;<a id="att" href="ProjManUpdatePrice.php"> Update Price </a>&emsp;&emsp;&emsp;&emsp;&emsp;
            <a id="att" href="ProjManUpdateStock.php"> Update Stock </a>&emsp;&emsp;&emsp;&emsp;
            <a id="att" href="ProjManViewProduct.php"> View Product </a>
        </center>
    <br><br><br><br>
    <center>&emsp;&emsp;<a id="att" href="ProjBillingHistory.php"> View Billing History </a></center>
    
    

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

</body>
<div class="foot">
<?php
    include "footer.php";
?>
</div>
</html>