<?php 
include("DBConnect.php");
session_start();
?>

<html>
    <head>
        <title>rental</title>
        <style>
            body {
                background-color: #a8a8a8;
                background:url("images/OIP.jpg");
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
    </head>
    <body>
        
        <table border="1" width="80%" align="center">
            <tr>
                <th class="headth">Vehicle ID</th>
                <th class="headth">Vehicle Name</th>
                <th class="headth">Rental Date</th>
                <th class="headth">Duration</th>
                <th class="headth">Rental ID</th>
            </tr>
            <?php 
            $mail=isset($_SESSION['loginemail']) ? $_SESSION['loginemail'] : '';
            $sql="select * from rental where email='$mail'";
            $rows = mysqli_query($con, $sql);
            foreach ($rows as $row): ?>
            <tr>
                <th class="bodyth"><?php echo $row["vehicle_id"]; ?></th>
                <th class="bodyth"><?php echo $row["vehicle_name"]; ?></th>
                <th class="bodyth"><?php echo $row["rental_date"]; ?></th>
                <th class="bodyth"><?php echo $row["duration"]; ?></th>
                <th class="bodyth"><?php echo $row["rental_id"]; ?></th>
            </tr>
            
        <?php endforeach ?>
        </table>
    </body>
</html>