<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header(location:"../controller/ProjLogOut.php");
    }

    $current= $_SESSION['Password'];

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        include "ProjDBConnect.php";
        $sql = "SELECT * FROM userinfo WHERE Username = ? and Password = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $Username, $Password);
        $Username = $_SESSION['Username'];
        $Password = $_POST['CurrentPass'];
        $response = $stmt->execute();
        if (empty($_POST['CurrentPass'])||empty($_POST['NewPass'])||empty($_POST['Confirm']))
            {
                echo "Please fill up correctly!";
            }
        else if($response)
        {
            $data = $stmt->get_result();
            if ($data->num_rows>0)
            {
                if($_POST['NewPass'] === $_POST['Confirm'])
                {
                    include "ProjDBConnect.php";
                    $sq = "UPDATE `userinfo` SET `Password`=? WHERE `Username` = ?";
                    $stm = $connection->prepare($sq);
                    $stm->bind_param("ss", $password, $username);
                    $password = $_POST['NewPass'];
                    $username = $_SESSION['Username'];

                    $resp = $stm->execute();

                    if ($resp) 
                    {
                        header("location:../view/ProjHomepage.php");
                    }
                    else {
                        echo "Error while saving";
                    }

                    $connection->close();
                }
                else
                {
                    echo "New password doesn't match!";
                }
            }
            else
            {
                echo "Current password doesn't match!";
            }
        }
    }
?>
<br><br><br>
<a href="../view/ProjChangePass.php" >Back </a>