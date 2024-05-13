<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $veiid = $_POST['veiid'];
    $veiname = $_POST['veiname'];
    $oneprice = $_POST['onedayprice'];
    $AC = $_POST['AC'];
    $type = $_POST['type'];
    $status=$_POST['status'];


    $ssql = "SELECT * FROM vehicle WHERE vehicle_id='$veiid'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Vehicle ID Already Taken');</script>";
    } else {

        $image = $_FILES['file']['name'];
        $imagesize = $_FILES['file']['size'];
        $image_tmp_name = $_FILES['file']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $image);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtention)) {
            echo "<script> alert('Invalid image extention');</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($image_tmp_name, '../Web/upload/' . $newImageName);
            $sql = "INSERT INTO vehicle (image,vehicle_id,vehicle_name,one_day_price,AC,type,status) VALUES ('$newImageName','$veiid','$veiname','$oneprice','$AC','$type','$status')";

            mysqli_query($con, $sql);
            echo "<script> alert('Added complete');</script>";
        }


    }

}

if (isset($_POST['Update'])) {

    $veiid = $_POST['veiid'];
    $veiname = $_POST['veiname'];
    $oneprice = $_POST['onedayprice'];
    $AC = $_POST['AC'];
    $type = $_POST['type'];
    $status=$_POST['status'];


    $ssql = "SELECT * FROM vehicle WHERE vehicle_id='$veiid'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {

        $image = $_FILES['file']['name'];
        $imagesize = $_FILES['file']['size'];
        $image_tmp_name = $_FILES['file']['tmp_name'];

        $validImageExtention = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $image);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtention)) {
            echo "<script> alert('Invalid image extention');</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($image_tmp_name, '../Web/upload/' . $newImageName);
            $sql = "Update vehicle SET image='$newImageName',vehicle_name='$veiname',one_day_price='$oneprice',AC='$AC',type='$type',status='$status' Where vehicle_id='$veiid'";
            mysqli_query($con, $sql);
            echo "<script> alert('Update complete');</script>";
        }
    } else {
        echo "<script> alert('Vehicle ID Already Taken');</script>";
    }


}


if (isset($_POST['Delete'])) {

    $veiid = $_POST['veiid'];

    $ssql = "SELECT * FROM vehicle WHERE vehicle_id='$veiid'";

    $result = mysqli_query($con, $ssql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $filename = $row['image'];

        }
        //delete from folder
        $file_path = '../Web/upload/' . $filename;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        //delete from the database

        $sql = "DELETE FROM vehicle WHERE vehicle_id='$veiid'";

        mysqli_query($con, $sql);
        echo "<script> alert('Delete complete');</script>";

    } else {

        echo "<script> alert('Design ID Not Found');</script>";

    }

}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <link rel="stylesheet" href="managevehicle.css">
</head>

<body>

    
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
                </div>
            </div>
        <?php endforeach ?>

        <form action="" method="POST" name="veiform" id="veiform" enctype="multipart/form-data"> 
        <div class="buttons-container">
                <div class="button-container">
                <button class="button" id="add" name="add" type="submit"><b>ADD</b></button>
                <button class="button" id="Update" name="Update" type="submit"><b>UPDATE</b></button>
                <button class="button" id="Delete" name="Delete" type="submit"><b>DELETE</b></button>
            </div>
         </div>
           <div class="input-container">
           <div id="file"> <input type="file" name="file" accept=".jpg, .jpeg, .png" required></div>
           <div id="veiid" > <input type="text" name="veiid" required placeholder="vehicle_id" ></div>
           <div id="veiname"> <input type="text"  name="veiname" required placeholder="vehicle_Name"></div>
           <div id="onedayprice" > <input type="text" name="onedayprice" required placeholder="One_Day_Price"></div>
           <div id="AC"> <input type="text"  name="AC" required placeholder="AC"></div>
           <div id="type"> <input type="text"  name="type" required placeholder="Vehicle_Type"></div>
           <div id="status"> <input type="text" name="status"  required placeholder="Status"></div>    
    </div>
           
        </form>

</body>

</html>