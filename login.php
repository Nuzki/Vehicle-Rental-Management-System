<?php
include ('DBconnect.php');
session_start();
$EmailID = $_POST['mail'];
$Password = $_POST['pass'];
$_SESSION["loginemail"] = $EmailID;


$checkEmail = "SELECT * FROM register WHERE EmailID = '$EmailID' AND Password ='$Password'";
$result1 = mysqli_query($con, $checkEmail);

if (mysqli_num_rows($result1) > 0) {
  foreach ($result1 as $row) {
    if ($row == "") {
    } else if ($row["UserType"] == "User") {
      header("location:customerlogin.php");
    } elseif ($row["UserType"] == "admin") {
      header("location:admin.php");
    } else {
      echo "UserNmae or password is incorrect";
    }
  }
} else {
  echo '<script> 
    alert("Invalid Email OR Pass");
    window.location.href ="login.html";
</script>';
}


?>