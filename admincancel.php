<?php
include ("DBconnect.php");
session_start();
if (isset($_POST['add'])) {
    $veiid = $_POST['veiid'];
    $veiname = $_POST['veiname'];
    $email = $_POST['email'];
    $redate = $_POST['redate'];
    $cancelid = $_POST['cancelid'];


    $ssql = "SELECT * FROM rental WHERE vehicle_id='$veiid'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {


        $sql = "INSERT INTO canceltab (vehicle_id,vehicle_name,email,cancel_date,cancelid) VALUES ('$veiid','$veiname','$email','$redate','$cancelid')";

        mysqli_query($con, $sql);
        echo "<script> alert('Cancel complete');</script>";
        $sql1 = "Update vehicle SET Status='available' Where vehicle_id='$veiid'";
            mysqli_query($con, $sql1);

    } else {

        echo "<script> alert('Vehicle ID Not found OR NOt BOOKED');</script>";
    }

}


?>













<!DOCTYPE html>
<html lang="en">
    <style>
     body {
            background-color: #a8a8a8;
            background:url("images/OIP.jpg");
            background-size:cover;
            background-position:center;
            height: 665px;
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
        @media screen and (max-width: 600px) {
            table {
                width: 100%;
            }
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
                <th class="headth">Email</th>
                <th class="headth">Cancel ID</th>
            </tr>
            <?php 
            $sql="select * from canceltab";
            $rows = mysqli_query($con, $sql);
            foreach ($rows as $row): ?>
            <tr>
                <th class="bodyth"><?php echo $row["vehicle_id"]; ?></th>
                <th class="bodyth"><?php echo $row["vehicle_name"]; ?></th>
                <th class="bodyth"><?php echo $row["cancel_date"]; ?></th>
                <th class="bodyth"><?php echo $row["email"]; ?></th>
                <th class="bodyth"><?php echo $row["cancelid"]; ?></th>
            </tr>           
        <?php endforeach ?>
        </table>
</body>

</html>