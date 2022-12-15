<?php

        $handle = fopen("../model/profile.json", "r");
        $data = fread($handle, filesize("../model/profile.json"));

        $explode = explode("\n", $data);

        $arr1 = array();
        for ($i = 0; $i < (count($explode)-1); $i++)
        {
            $json=json_decode(($explode[$i]));
            array_push($arr1, $json);
        }

        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            include "ProjDBConnect.php";
            $sql = "SELECT * FROM userinfo WHERE Username = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $user);
            $user = $_POST['Username'];
            $response = $stmt->execute();

            if (empty($_POST['Username']))
            {
                echo "Please enter username!";
            }
            else if ($response)
            {
                $data=$stmt->get_result();
                while ($row = $data->fetch_assoc())
                {
                    session_start();
                    $_SESSION['Username']=$row["Username"];
                    $_SESSION['Question']=$row["Question"];
                    $_SESSION['Answer']=$row["Answer"];
                    header("Location:../view/ProjForgetPass.php");
                }
            }
            else
            {
                echo "Incorrect Username!";
            }
        }
?>
<br><br><br>
<a href="../view/ProjLoginForm.php" >Login </a>