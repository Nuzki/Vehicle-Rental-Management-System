<?php
include ("DBconnect.php");
?>


<html>

<head>
    <title>Rules</title>
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
            <th class="headth">ID</th>
            <th class="headth">Rules</th>
        </tr>
        <?php
        $checkEmail = "SELECT * FROM rules";
        $result1 = mysqli_query($con, $checkEmail);
        foreach ($result1 as $row):
            ?>
            <tr>
                <th class="bodyth"><?php echo $row["id"]; ?></th>
                <th class="bodyth"><?php echo $row["rule"]; ?></th>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>