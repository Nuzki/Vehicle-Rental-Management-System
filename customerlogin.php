<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>customer login</title>
        <link rel="stylesheet" href="cuslogin.css">
    </head>
    <body>
            <section class="header" id="header">
                <nav class="navbar">
                <ul>
                    <li><a href="vechile.php">Vehicle</a></li>
                    <li><a href="rental.php">Rental</a></li>
                    <li><a href="return.php">Return</a></li>
                    <li><a href="rules.php">Rules</a></li>
                    <li><a href="Fines.php">Fines</a></li>
                    <li><a href="cancel.php">Cancel</a></li>
                </ul>
                </nav>
            </section>
            <section class="home">
                <div class="title-container">
                 <h1>Nagasaki Tours<span> & </span>Rent a Car</h1>
           
            </div>
            <div class="image-container">
                <img src="./images/pexels-photo-4512439.jpeg.jpg" alt="">
            </div>
            <div class="form-container">
            <form action="" method= "post">
                <b><button id="cusout" type="submit" name="cusout">Log Out</button></b>
                </form>
            </div>
</section>
    </body>
</html>

<?php

if(isset($_POST['cusout'])){
    header("location:login.html");
}

?>
