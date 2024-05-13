<?php
include ("DBconnect.php");
session_start();
?>




<!DOCTYPE html>
<html lang="en">
    <style>
        body {
            background-color: #a8a8a8;
            background:url("images/OIP.jpg");
            height: 670px;
            background-size:cover;
            background-position:center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto; 
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd; 
        }
        .headth {
            font-size: 22px;
            font-weight: bold;
            background-color: #333;
            color: #fff;
        }
        .bodyth {
            font-size: 18px;
        }
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
</head>

<body>
<table border="1" width="80%" align="center">
            <tr>
                <th class="headth">Vehicle ID</th>
                <th class="headth">Vehicle Name</th>
                <th class="headth">Cancel Date</th>
                <th class="headth">Cancel ID</th>
            </tr>
            <?php 
            $mail=isset($_SESSION['loginemail']) ? $_SESSION['loginemail'] : '';
            $sql="select * from canceltab where email='$mail'";
            $rows = mysqli_query($con, $sql);
            foreach ($rows as $row): ?>
            <tr>
                <th class="bodyth"><?php echo $row["vehicle_id"]; ?></th>
                <th class="bodyth"><?php echo $row["vehicle_name"]; ?></th>
                <th class="bodyth"><?php echo $row["cancel_date"]; ?></th>
                <th class="bodyth"><?php echo $row["cancelid"]; ?></th>
            </tr>
            
        <?php endforeach ?>
        </table>

</body>

</html>