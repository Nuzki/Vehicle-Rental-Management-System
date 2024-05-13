<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admin login</title>
        <link rel="stylesheet" href="adhome.css">
    </head>
    <body>
            <section class="header" id="header">
                <nav class="navbar">
                <ul>
                    <li><a href="managevehicle.php">Manage Vehicle</a></li>
                    <li><a href="manageuser.php">Manage User</a></li>
                    <li><a href="adminrental.php">Manage Rental</a></li>
                    <li><a href="adminreturn.php">Manage Return</a></li>
                    <li><a href="adminrules.php">Manage Rules</a></li>
                    <li><a href="adminfines.php">Manage Fines</a></li>
                    <li><a href="admincancel.php">Manage Cancel</a></li>
                </ul>
            </nav>
</section>
            <section class="home">
                <div class="title-container">
                <h1>Nagasaki Tours<span> & </span>Rent a car</h1>

            </div>
            <div class="image-container">
                <img src="./images/pexels-photo-4512439.jpeg.jpg" alt="">
            </div>    
            <div class="form-container">
            <form action="" method="post">
                <b><button id="adminout" type="submit" name="adminout">Log Out</button></b>
           </form>
           </div>
</section>
    </body>
</html>

<?php

if(isset($_POST['adminout'])){
    header("location:login.html");
}

?>
