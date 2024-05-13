<?php
include ("DBconnect.php");

if (isset($_POST['add'])) {
    $UserName = $_POST['txt'];
    $TelephoneNo = $_POST['Number'];
    $Address = $_POST['Add'];
    $EmailID = $_POST['mail'];
    $Password = $_POST['pass'];

    $checkEmail = "select * from register Where EmailID= '$EmailID'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        echo '<script>
     alert("user already registered try new");
     </script>';
    } else {
        $sql = "INSERT into register(UserName,TelephoneNo,Address,EmailID,Password,UserType)
     values('$UserName','$TelephoneNo','$Address','$EmailID','$Password','User')";

        if (mysqli_query($con, $sql)) {
            echo '<script>
            alert("successfully Added");
            </script>';
        } else {
            echo "registration failed..try again";
        }
    }
}

if (isset($_POST['delete'])) {
    $EmailID = $_POST['mail'];

    $checkEmail = "select * from register Where EmailID= '$EmailID'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "delete from register where EmailID='$EmailID'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("Deleted");
               </script>';
        } else {
            echo "Delete failed..try again";
        }

    } else {

        echo '<script>
     alert("user not found");
     </script>';
    }
}

if (isset($_POST['update'])) {
    $UserName = $_POST['txt'];
    $TelephoneNo = $_POST['Number'];
    $Address = $_POST['Add'];
    $EmailID = $_POST['mail'];
    $Password = $_POST['pass'];

    $checkEmail = "select * from register Where EmailID= '$EmailID'";

    $result1 = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result1) > 0) {
        $sql = "update register set UserName='$UserName',TelephoneNo='$TelephoneNo',Address='$Address',Password='$Password' where EmailID='$EmailID'";

        if (mysqli_query($con, $sql)) {
            echo '<script>
               alert("successfully updated");
               </script>';
        } else {
            echo "registration failed..try again";
        }
    } else {


        echo '<script>
        alert("user not found");
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
            margin-top: 250px;
        }

        .button-container {
            position: relative;
            margin-top:-3px;
        }

        .input-container {
            position: relative;
            top: 30%;
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
        width: 605px;
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
            <th class="headth">Customer Name</th>
            <th class="headth">Telephone No</th>
            <th class="headth">Address</th>
            <th class="headth">Email</th>
        </tr>
        <?php
        $checkEmail = "SELECT * FROM register";
        $result1 = mysqli_query($con, $checkEmail);
        foreach ($result1 as $row):
            ?>
            <tr>

                <th class="bodyth"><?php echo $row["UserName"]; ?></th>
                <th class="bodyth"><?php echo $row["TelephoneNo"]; ?></th>
                <th class="bodyth"><?php echo $row["Address"]; ?></th>
                <th class="bodyth"><?php echo $row["EmailID"]; ?></th>
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
                <div id="txt1"><input type="text" required name="txt" placeholder="Customer_Name"></div>
                <div id="txt2"><input type="text" required name="Number" placeholder="Telephone_N0"></div>
                <div id="txt3"><input type="text" required name="Add" placeholder="Address"></div>
                <div id="txt3"><input type="text" required name="mail" placeholder="Email_id"></div>
                <div id="txt3"><input type="text" required name="pass" placeholder="Password"></div>
        </div>
         
    </form>
</body>

</html>