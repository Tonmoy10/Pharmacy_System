<?php
    session_start();
    if (count($_SESSION)===0)
    {
        header(location:"../controller/Logout.php");
    }
?>

<?php
    $Ans= $_SESSION['Answer'];
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if (empty($_POST['InputAnswer']))
        {
            echo "Please fill up correctly!";
        }
        else if($_POST['InputAnswer'] === $Ans)
        {
            include "ProjDBConnect.php";
            $sql = "UPDATE `userinfo` SET `Password`=? WHERE `Username` = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ss", $pass, $user);
            $pass = $_POST['InputPassword'];
            $user = $_SESSION['Username'];
            $response = $stmt->execute();

            if ($response)
            {
                header("location:ProjLogOut.php");
            }
            else
            {
                echo "Error!";
            }
        }
        else
        {
            echo "Wrong answer!";
        }
    }
?>
<br><br><br>
<a href="../view/ProjLoginForm.php" >Login </a>