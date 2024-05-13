<?php
include ("DBconnect.php");


if (isset($_POST['book'])) {
    header("Location:bookinterface.php");
}


if (isset($_POST['cancel'])) {
    header("Location:cancelform.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <link rel="stylesheet" href="vehicle.css">
</head>

<body>
    <div class="container">
       
            <div class="container">
            <?php
        $rows = mysqli_query($con, "Select * from vehicle");
        foreach ($rows as $row): ?>
                <div class="card">
                    <div class="imgbx">
                        <a href="#">
                            <img src="upload/<?php echo $row["image"]; ?>" height="180px" width="280px">
                        </a>
                        <h2>vehicle name:<?php echo $row["vehicle_name"]; ?></h2>
                        <p>vehicle ID:<?php echo $row["vehicle_id"]; ?></p>
                        <p>one day price:<?php echo $row["one_day_price"]; ?></p>
                        <p>AC:<?php echo $row["AC"]; ?></p>
                        <p>vehicle type:<?php echo $row["type"]; ?></p>
                        <p>Status:<?php echo $row["Status"] ?></p>
                        <form action="" method="POST">
                            <ul>
                                <li><button type="submit" name="book" id="book"><b>Book Now</b></button></li>
                                <li><button type="submit" name="cancel" id="cancel"><b>Cancel</b></button></li>
                            </ul>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
</body>

</html>