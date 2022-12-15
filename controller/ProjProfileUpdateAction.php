<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header("location:../controller/Logout.php");
    }

    $handle = fopen("../model/profile.json", "r");
    $data = fread($handle, filesize("../model/profile.json"));

    $explode = explode("\n", $data);

    $arr2 = array();
    for ($i = 0; $i < count($explode)-1; $i++)
    {
        $json=json_decode(($explode[$i]));
        array_push($arr2, $json);
    }
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if (empty($_POST['FirstName'])||empty($_POST['LastName'])||empty($_POST['DateOfBirth'])||empty($_POST['Email'])||empty($_POST['CurrentAddress'])||empty($_POST['PermanentAddress']))
        {
            echo "Please fill up the form correctly!";
        }
        else
        {
            $arr2[$_SESSION['index']]->FirstName=$_POST['FirstName'];
            $arr2[$_SESSION['index']]->LastName=$_POST['LastName'];
            $arr2[$_SESSION['index']]->DateOfBirth=$_POST['DateOfBirth'];
            $arr2[$_SESSION['index']]->CurrentAddress=$_POST['CurrentAddress'];
            $arr2[$_SESSION['index']]->PermanentAddress=$_POST['PermanentAddress'];
            $arr2[$_SESSION['index']]->Phone=$_POST['Phone'];
            $arr2[$_SESSION['index']]->Email=$_POST['Email'];


            $handle1 = fopen("../model/profile.json", "w");

            for ($i=0; $i<count($explode)-1;$i++)
            {
                $encode = json_encode($arr2[$i]);
                $res = fwrite($handle1, $encode . "\n");
            }

            if($res)
            {
                $time = date("r");
                setcookie($_SESSION['Username'], $time, time() + (86400 * 30), "/");
                $flag=true;
                header("location:../view/ProjProfile.php");
            }
            else
            {
                $flag=false;
            }
        }
        
    }
?>
<br><br><br>
<a href="../view/ProjProfileUpdate.php" >Back </a>