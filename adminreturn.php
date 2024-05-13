<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $vehicle_name = $_POST['vehicle_name'];
    $return_date = $_POST['return_date'];
    $EmailID = $_POST['mail'];
    $return_id = $_POST['retid'];

    
        $sql = "INSERT into returntab(vehicle_id,vehicle_name,email,return_date,return_id)
     values('$vehicle_id','$vehicle_name','$EmailID','$return_date',$return_id)";

        if (mysqli_query($con, $sql)) {
            echo '<script>
            alert("successfully Added");
            </script>';
        } else {
            echo "registration failed..try again";
        }
        $sql1 = "Update vehicle SET Status='available' Where vehicle_id='$vehicle_id'";
            mysqli_query($con, $sql1);
}

if (isset($_POST['delete'])) {
    $EmailID = $_POST['mail'];
    $return_id = $_POST['retid'];


    $checkEmail = "select * from returntab Where return_id= '$return_id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "delete from returntab where return_id= '$return_id'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("Deleted");
               </script>';
        } else {
            echo "Delete failed..try again";
        }

    } else {

        echo '<script>
     alert("ID not found");
     </script>';
    }
}

if (isset($_POST['update'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $vehicle_name = $_POST['vehicle_name'];
    $return_date = $_POST['return_date'];
    $EmailID = $_POST['mail'];
    $return_id = $_POST['retid'];


    $checkEmail = "select * from returntab Where return_id= '$return_id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "update returntab set vehicle_id='$vehicle_id',vehicle_name='$vehicle_name',return_date='$return_date',email='$EmailID' where return_id= '$return_id'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("successfully updated");
               </script>';
        } else {
            echo "update failed..try again";
        }
    } else {


        echo '<script>
        alert("id not found");
        </script>';
    }
}

?>

<html>

<head>
    <title>return</title>
    <style>
         body {
            background-color: #a8a8a8;
            background:url("images/OIP.jpg");
            background-size:cover;
            background-position:center;
        }

        .buttons-container {
            display: flex;
            justify-content: space-around;
            margin-top: 420px;
        }

        .button-container {
            position: relative;
        }

        .input-container {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            text-align:center;
        }
        .button {
            display: block;
            text-align: center;
            background-color: gray;
            color: black;
            font-size: 17px;
            width: 150px;
            margin-right: 10px;
            margin-bottom:7px;
        }
        .button:last-child{
            margin: right 0;
        }

        .button:hover {
            transform: scale(1.1);
        }
        
        .input-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        }

        input[type="text"] {
        width: 150px;
        margin-right: 10px; 
        height:40px;
        font: size 18px;
        }

        input[type="text"]:last-child {
        margin-right: 8px; 
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
        @media screen and (max-width: 768px) {
    .buttons-container {
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .button {
        margin: 5px 0;
    }

    .input-container {
        top: 50%;
        transform: translateY(-50%);
        width: 540px;
    }

    input[type="text"] {
        width: 80%;
        margin-right: 0;
        font-size: 12px; /* Adjust font size for smaller screens */
    }

    table {
        width: 90%;
        margin: 20px auto;
    }
}

@media screen and (max-width: 480px) {
    .buttons-container {
        margin-top: 12px;
    }

    input[type="text"] {
        width: 90%;
        font-size: 12px; /* Further reduce font size for smaller screens */
    }

    table {
        width: 95%;
    }
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
            <th class="headth">Return ID</th>
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
                <th class="bodyth"><?php echo $row["return_id"]; ?></th>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="" method="post">
        <div class="buttons-container">
            <div class="button-container">
                <button class="button" id="add" name="add" type="submit"><b>ADD</b></button>
                <button class="button" id="delete" name="delete" type="submit"><b>DELETE</b></button>
                <button class="button" id="update" name="update" type="submit"><b>UPDATE</b></button>
            </div>
            </div>
            <div class="input-container">
                <div id="txt1"><input type="text" required name="vehicle_id" placeholder="vehicle_id"></div>
                <div id="txt2"><input type="text" required name="vehicle_name" placeholder="vehicle_Name"></div>
                <div id="txt3"><input type="text" required name="mail" placeholder="Email_id"></div>
                <div id="txt3"><input type="text" required name="return_date" placeholder="Return_date"></div>
                <div id="txt4"><input type="text" required name="retid" placeholder="Return_id"></div>
            </div>
            </div>
    </form>
</body>

</html>