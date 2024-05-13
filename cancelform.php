<?php
include ("DBconnect.php");
session_start();
if (isset($_POST['add'])) {
    $veiid = $_POST['veiid'];
    $veiname = $_POST['veiname'];
    $redate = $_POST['redate'];
    $cancelid = $_POST['cancelid'];
    $mail=isset($_SESSION['loginemail']) ? $_SESSION['loginemail'] : '';


    $ssql = "SELECT * FROM rental WHERE vehicle_id='$veiid'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {


        $sql = "INSERT INTO canceltab (vehicle_id,vehicle_name,email,cancel_date,cancelid) VALUES ('$veiid','$veiname','$mail','$redate','$cancelid')";

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
            height: 670px;
            background-size:cover;
            background-position:center;
            overflow-x: hidden;
            overflow-y: hidden;
        }
        .container {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%,-50%);
        width: 30px;    
        }
        .container label{
            font-size: 30px;
            margin: 15px 0;
            color:black;
        }
        .container input{
            font-size:13px;
            padding: 20px 20px;
            width: 250px;
            border: 0;
            border-radius: 5px;
            outline: none;
            margin-right: 100px;
        }
        .container button{
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 100px;
            border: 0;
            border-radius: 5px;
            background-color: gray;
            transform: scale(1.1);
        } 
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
</head>

<body>

<form action="" method="POST" name="veiform" id="veiform">
    <div class="container">     
         <label for=""><b>vehicle_id</b></label>
        <input type="text" id="veiid" name="veiid" required >
        <label for=""><b>vehicle_Name</b></label>
        <input type="text" id="veiname" name="veiname" required>
        <label for=""><b>Cancel_date</b></label>
        <input type="text" id="redate" name="redate" required>
        <label for=""><b>cancel_id</b></label>
        <input type="text" id="rentid" name="cancelid" required>
        <button type="submit" id="add" name="add"><b>Cancel<b></button>
    </div>
    </form>

      

</body>

</html>