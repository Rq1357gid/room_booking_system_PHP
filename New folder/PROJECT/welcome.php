<?php

session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
         /* Style for the round button */
         .round-button {
            width: 60px;
            height: 60px;
            background-color: whitesmoke; /* Change the background color as desired */
            border-radius: 50%;
            border: none;
            color: #002147; /* Text color */
            font-size: 12px;
            cursor: pointer;
        }

        /* Glowing effect when hovering over the button */
        .round-button:hover {
            animation: glowing 1s infinite;
        }

        @keyframes glowing {
            0% {
                box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Adjust the shadow color as desired */
            }
            50% {
                box-shadow: 0 0 20px rgba(52, 152, 219, 0.7);
            }
            100% {
                box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS<br></a>
        <h4 class="my-5" style="color: #002147;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h4>
        <button class="round-button" onclick="window.location.href='weather/index.html'">Check Weather</button>
        <div class="dropdown">
            <button class="dropbtn">LOGOUT</button>
            <div class="dropdown-content">
                <!--<a href="reset-password.php" class="btn btn-warning">Reset Password</a>-->
                <a href="logout.php" class="btn btn-danger">Sign Out</a>
            </div>
    </header>
    <div class="image-container" style="width: 500px;">
        <a href="superior.php?roomtype=SUPERIOR"><img src="img/superior.jpg" class="image1" style="box-shadow: 0 0 50px 15px #06042c;border-radius:10px;"></a><br>
        <p style="margin: right 50px; padding: 20px;
    background: azure; border-radius:15px;float:right;position: absolute;
right: 0px;top:200px;margin-right:100px; width:500px;height: 200px;"><b>SUPERIOR ROOM :</b>
            Room size: 20 sq. m
            LCD flat screen TV with DSTV
            Beds: Double or Twin
            King size bed
            Complimentary Wi-Fi
            Personal Minibar
            Complimentary coffee making facilities
            Direct dial International telephone
            Hair driers, iron & board
            Separate toilet and a rain shower
            Safety deposit box
            Non-smoking
            2 rooms for guests with special needs</p><br>
       <a href="superior.php?roomtype=JUNIOR"><img src="img/junior.jpg" class="image2" style="box-shadow: 0 0 50px 15px #06042c;border-radius:10px;"></a><br>
        <p style="margin: right 50px; padding: 20px 50px;
    background: azure; border-radius:15px;float:right;position: absolute;
right: 0px;top:450px;margin-right:100px; width:500px;height: 200px;"> <b>JUNIOR SUITE :</b>
            Room size: 23 sq. m
            LCD flat screen TV with DSTV
            Complimentary Wi-Fi hot spots
            Personal Minibar in the room
            Safety deposit box
            Complimentary coffee making facilities
            Direct dial International telephone
            King size bed
            Hair driers, iron & board
            Separate toilet and a rain shower
            Safety deposit box
            Non-smoking</p><br><br>
        <a href="superior.php?roomtype=EXECUTIVE"><img src="img/executive.jpg" class="image3" style="box-shadow: 0 0 50px 15px #06042c;border-radius:10px;"></a><br>
        <p style="margin: right 50px; padding: 20px 50px;
    background: azure; border-radius:15px;float:right;position: absolute;
right: 0px;top:700px;margin-right:100px; width:500px;height: 200px;"><b>EXECUTIVE SUITE :</b>
            Room size: 50 sq. m
            Separate Bedroom with a king size bed
            Complimentary Wi-fi hot spots
            Personal Minibar in the room
            Safety deposit box
            Complimentary coffee making facilities
            Direct dial International telephone
            Hair dryers, iron & board
            Bathtub, a toilet and a rain shower
            Sitting room with a work area
            Non-smoking</p><br><br>
    </div>

    <div class="service2">
        <!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="footer.css">
</head>
<body>
<footer>
<div class="footer">
<div class="row">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
</div>

<style>
        /* CSS for the outer box */
        .outer-box {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,250,250, 0.5); /* Semi-transparent black background */
            z-index: 1; /* Places it behind other content */
        }

        /* CSS for the inner box (your existing styles) */
        .inner-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(25, 25, 112,0.8);
            color: whitesmoke;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(25, 25, 112, 0.5);
            z-index: 2; /* Places it in front of the outer box */
        }
    </style>
</head>
<body>
<div class="row">
    <ul>
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Our Services</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms & Conditions</a></li>
    </ul>
</div>

<div class="outer-box">
    <div class="inner-box">
        <div id="displayedText">
            <p id="displayTextContent">This is the default text.</p>
        </div>
    </div>
</div>

<script>
    // JavaScript code here

    const outerBox = document.querySelector(".outer-box");
    const innerBox = document.querySelector(".inner-box");
    const displayedTextContent = document.getElementById("displayTextContent");

    const listItems = document.querySelectorAll(".row ul li");

    const sentences = [
        "hmsbookyourroom@yahoo.com",
        "Room Booking service, Transport Service, and Restaurant Service",
        "Our Privacy Policy is designed to inform you about how we collect, use, and protect your personal information while using our services.",
        "Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern our relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website."
    ];

    function hideDisplayedBlock() {
        outerBox.style.display = "none";
        innerBox.style.display = "none";
    }

    listItems.forEach((item, index) => {
        item.addEventListener("click", function (event) {
            displayedTextContent.textContent = sentences[index];
            outerBox.style.display = "block";
            innerBox.style.display = "block";
            event.stopPropagation();
        });
    });

    // Close the displayed block when clicking anywhere outside of it
    document.addEventListener("click", function () {
        hideDisplayedBlock();
    });

    // Prevent the click event from bubbling up to the document and closing the block
    innerBox.addEventListener("click", function (event) {
        event.stopPropagation();
    });
</script>

<div class="row">
HOTEL MANAGEMENT (ROOM BOOKING SYSTEM)
</div>
</div>
</footer>
    </div>
</body>

</html>