<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $rule = $_POST['rule'];
    $id = $_POST['id'];

    $checkEmail = "select * from rules Where id ='$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        echo '<script>
     alert("try new");
     </script>';
    } else {
        $sql = "INSERT into rules(id,rule)
     values('$id','$rule')";

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

    $checkEmail = "select * from rules Where id= '$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "delete from rules where id='$id'";

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
    $rule = $_POST['rule'];
    $id = $_POST['id'];

    $checkEmail = "select * from rules Where id ='$id'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "update rules set rule='$rule' where id='$id'";

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
    <title>Rules</title>
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
    <form action="" method="post">
        <div class="buttons-container">
            <div class="button-container">
                <button class="button" id="add" name="add" type="submit"><b>ADD</b></button>
                <button class="button" id="delete" name="delete" type="submit"><b>DELETE</b></button>
                <button class="button" id="update" name="update" type="submit"><b>UPDATE</b></button>
            </div>
        </div>
            <div class="input-container">
            <div id="txt1"><input type="text" required name="id" placeholder="Rule_id"></div>
            <div id="rule"><input type="text" name="rule" placeholder="Rule"></div>
            </div>
    </form>
</body>

</html>