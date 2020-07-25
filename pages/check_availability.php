<?php 

$check_in = htmlspecialchars($_POST['check_in']);
$check_out = htmlspecialchars($_POST['check_out']);

if( $check_in == null || $check_out == null || $check_out < $check_in ){ 
    header("location: index.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="body-container">
        <div class="header">
            <div class="logo"><b><a href="index.html">OPEN GATE HOTEL</a></b></div>
            <div class="nav-item">ROOMS</div>
            <div class="nav-item">ABOUT</div>
            <div class="nav-item" onclick="booking_form('book')">BOOK NOW</div>
            <div class="nav-item">CONTACT US</div>
        </div>
        
        <div class="section_1">
        <h3>Room is available</h3>
        <h3>Fill in the form below to book</h3>
            <form action="room_book.php" method="POST">
                <label>First Name</label>
                <input type="text" name="firstname" placeholder="First Name" required>
                <br>
                <label>Last Name :</label>
                <input type="text" name="lastname" placeholder="Last Name" required>
                <br>
                <label>Phone No. :</label>
                <input type="phone" name="phone" placeholder="Phone No." required>
                <br>
                <label>E-mail :</label>
                <input type="email" name="email" placeholder="E-mail" required>
                <br>
                <label>Confirm E-mail :</label>
                <input type="email" name="email_2" placeholder="Re-type Email" required>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="section_2" style="width: 25%; min-width: 75mm; padding: 5px; float: right;">
            <div class="flex">
                <h3>Healthy food</h3>
                <img src="..\images\cody-chan-TYg-HVGkLc8-unsplash.jpg" alt="vegan bowl image" width="270px">
                <br>
                <caption>We provide healthy deliceous food for our visitors</caption>
            </div>
            <br>
            <div class="flex">
                <h3>Clean Environment</h3>
                <img src="..\images\andrea-davis-0hq5BQNdl48-unsplash.jpg" alt="vegan bowl image" width="270px" height="200px">
                <br>
                <caption>We provide clean environment</caption>
            </div>
        </div>
        
    </div>
    
</body>
</html>