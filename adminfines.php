<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $issue = $_POST['issue'];
    $id = $_POST['id'];
    $fine = $_POST['fine'];

    $checkEmail = "select * from fine Where id ='$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        echo '<script>
     alert("try new");
     </script>';
    } else {
        $sql = "INSERT into fine(id,issue,fine)
     values('$id','$issue','$fine')";

        if (mysqli_query($con, $sql)) {
            echo '<script>
            alert("successfully Added");
            </script>';
        } else {
            echo " failed..try again";
        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $checkEmail = "select * from fine Where id= '$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "delete from fine where id='$id'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("Deleted");
               </script>';
        } else {
            echo "Delete failed..try again";
        }

    } else {

        echo '<script>
     alert("id not found");
     </script>';
    }
}
if (isset($_POST['update'])) {
    $issue = $_POST['issue'];
    $id = $_POST['id'];
    $fine = $_POST['fine'];

    $checkEmail = "select * from fine Where id ='$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "update fine set issue='$issue',fine='$fine' where id='$id'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("successfully updated");
               </script>';
        } else {
            echo " failed..try again";
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
    <title>fines</title>
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
            margin-top: 460px;
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
        height: 40px;
        font-size:18px;
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
            <th class="headth">Fine ID</th>
            <th class="headth">Issue</th>
            <th class="headth">Fines</th>
        </tr>
        <?php
        $checkEmail = "SELECT * FROM fine";
        $result1 = mysqli_query($con, $checkEmail);
        foreach ($result1 as $row):
            ?>
            <tr>
                <th class="bodyth"><?php echo $row["id"]; ?></th>
                <th class="bodyth"><?php echo $row["issue"]; ?></th>
                <th class="bodyth"><?php echo $row["fine"]; ?></th>
            <tr>
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
                <div id="txt1"><input type="text" required name="id" placeholder="Fine_id"></div>
                <div id="txt2"><input type="text" required name="issue" placeholder="issue"></div>
                <div id="txt3"><input type="text" required name="fine" placeholder="Fines"></div>
            </div>
    </form>

</body>

</html>