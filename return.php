<?php
include ("DBconnect.php");

?><html>

<head>
    <title>return</title>
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
            <th class="headth">VEhicle ID</th>
            <th class="headth">Vehicle Name</th>
            <th class="headth">Customer Email</th>
            <th class="headth">Return Date</th>
        </tr>
        <tr>
            <?php
            $checkEmail = "SELECT * FROM returntab";
            $result1 = mysqli_query($con, $checkEmail);
            foreach ($result1 as $row):
                ?>
                <th class="bodyth"><?php echo $row["vehicle_id"]; ?></th>
                <th class="bodyth"><?php echo $row["vehicle_name"]; ?></th>
                <th class="bodyth"><?php echo $row["email"]; ?></th>
                <th class="bodyth"><?php echo $row["return_date"]; ?></th>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>