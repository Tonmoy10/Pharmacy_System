<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/ViewProduct.css">
    <title>Product List</title>

</head>

<div class="head">
<?php
    include "header.php";
?>
</div>

<body>
    <a id="att" href="ProjHomepage.php">HOME </a> || <a id="att" href="../controller/ProjLogOut.php"> Log Out </a>

        <center>
            <h1>Product List </h1>
            <?php
                include "../controller/ProjMedTable.php";
            ?>
        </center>
</body>