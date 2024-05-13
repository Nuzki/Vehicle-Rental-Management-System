<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $veiid = $_POST['veiid'];
    $veiname = $_POST['veiname'];
    $email = $_POST['email'];
    $redate = $_POST['redate'];
    $duration = $_POST['duration'];
    $rentid = $_POST['rentid'];


    $ssql = "SELECT * FROM vehicle WHERE vehicle_id='$veiid' AND Status='available'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {


        $sql = "INSERT INTO rental (vehicle_id,vehicle_name,email,rental_date,duration,rental_id) VALUES ('$veiid','$veiname','$email','$redate','$duration','$rentid')";

        mysqli_query($con, $sql);
        echo "<script> alert('Added complete');</script>";
        $sql1 = "Update vehicle SET Status='book' Where vehicle_id='$veiid'";
            mysqli_query($con, $sql1);

    } else {

        echo "<script> alert('Vehicle ID Not found OR Already BOOKED');</script>";
    }

}


?>













<!DOCTYPE html>
<html lang="en">
    <style>
        *{
            padding: 0;
            margin:0 ;
        }
        body {
            color: #a8a8a8;
            background:url("images/OIP.jpg");
            background-size:cover;
            overflow-y:hidden;
            overflow-x:hidden;
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
        <label for=""><b>Email_id</b></label>
        <input type="text" id="email" name="email" required>
        <label for=""><b>Rental_date</b></label>
        <input type="text" id="redate" name="redate" required>
        <label for=""><b>Duration</b></label>
        <input type="text" id="duration" name="duration" required>
        <label for=""><b>Rental_id</b></label>
        <input type="text" id="rentid" name="rentid" required>
        <button type="submit" id="add" name="add"><b>Book</b></button>
    <div>    
    </form>

</body>

</html>