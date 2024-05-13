<?php
include('DBconnect.php');
$UserName = $_POST['txt'];
$TelephoneNo = $_POST['Number'];
$Address = $_POST['Add'];
$EmailID = $_POST['mail'];
$Password = $_POST['pass'];



$checkEmail = "select * from register Where EmailID= '$EmailID'";

$result1 = mysqli_query($con, $checkEmail);

if(mysqli_num_rows($result1) > 0){
     echo '<script>
     alert("user already registered try new");
     </script>';
}else{
     $sql = "INSERT into register(UserName,TelephoneNo,Address,EmailID,Password,UserType)
     values('$UserName','$TelephoneNo','$Address','$EmailID','$Password','User')";

     if(mysqli_query($con,$sql)){
          echo '<script>
            alert("successfully Added");
            </script>';
     }else{
          echo "registration failed..try again";
     }
}
?>