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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .superior {
            font-weight: 500;
            margin-top: 100px;
            margin-left: 200px;
            margin-right: auto;
            border-radius: 15px;
            width: 400px;
            height: 700px;
            padding: 15px;
            background-color: rgba(245, 245, 245, 0.7);
            box-shadow: lightslategray;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS<br></a>
        <h4 class="my-5" style="color: #002147; font-size:large;"><?php
                                                                    if (isset($_GET['roomtype'])) {
                                                                        $roomType = $_GET['roomtype'];
                                                                        echo $roomType;
                                                                    }
                                                                    ?></h4>
        
        <div class="dropdown">
            <button class="dropbtn">LOGOUT</button>
            <div class="dropdown-content">
                <a href="logout.php" class="btn btn-danger">Sign Out</a>
            </div>
        </div>
    </header>

    <?php

    $name = $email = $phone = $adults = $children = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $adults = test_input($_POST["adults"]);
        $children = test_input($_POST["children"]);
        if (isset($_POST["checkin"])) {
            $checkin = test_input($_POST["checkin"]);
        }
        if (isset($_POST["checkout"])) {
            $checkout = test_input($_POST["checkout"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <div style="max-height: 800px; overflow: auto;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="superior">
                <center>Book Online</center><br><br>
                <label>Name &emsp;&emsp;&emsp;&emsp;&emsp; </label><input type="text" name="name" required><br><br>
                <label>Adults:&nbsp;</label>&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;<input type="text" name="adults" required>
                <br><br>

                <label>Children:&nbsp;</label>&emsp;&emsp;&emsp;&emsp;<input type="text" name="children" required>
                <br><br>

                <label>Phone Number&emsp;</label>&emsp;<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
                <label>E-mail address&ensp;&nbsp;</label>&emsp;&nbsp;<input type="email" id="email" name="email" required><br><br>
                <label>Check-In&emsp;&emsp;&emsp;&ensp;&nbsp;</label><input type="date" name="checkin" id="checkin" required><br><br>
                <label>Check-Out &emsp;&emsp;&ensp;</label><input type="date" name="checkout" id="checkout" required><br><br><br>
                <div style="display: flex; justify-content: center;">
                    <button style="font-size: large;
                    height: 50px;
                    background-color: #3CB371;
                    border-radius: 5px;
                    width: 200px;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" type="submit" name="submit">FINISH</button>

                    &nbsp;&nbsp;

                    <button style="font-size: large;
                    height: 50px;
                    background-color: #7FFFD4;
                    border-radius: 5px;
                    width: 200px;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <a href="welcome.php">BACK</a>
                    </button>
                </div>
            </div>
        </form>
    </div>


</body>


<?php
require_once "config.php";

$days = 0;
$rate = 0;
$availability = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = test_input($_POST["name"]);
    $adults = test_input($_POST["adults"]);
    $children = test_input($_POST["children"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $checkin = test_input($_POST["checkin"]);
    $checkout = test_input($_POST["checkout"]);


    if (!empty($checkin) && !empty($checkout)) {
        $checkin_timestamp = strtotime($checkin);
        $checkout_timestamp = strtotime($checkout);
        $seconds_diff = $checkout_timestamp - $checkin_timestamp;
        $days = round($seconds_diff / (60 * 60 * 24));


        if ($checkin_timestamp < time() || $checkout_timestamp < time()) {
            $availability = false;
        } elseif ($days == 1) {
            $rate = 1000;
        } elseif ($days == 2) {
            $rate = 2000;
        } elseif ($days == 3) {
            $rate = 3000;
        } elseif ($days == 4) {
            $rate = 4000;
        } elseif ($days == 5) {
            $rate = 5000;
        } elseif ($days == 6) {
            $rate = 6000;
        } elseif ($days == 7) {
            $rate = 7000;
        } elseif ($days > 7 && $days < 12) {
            $rate = 10000;
        } elseif ($days > 13 && $days < 30) {
            $rate = 20000;
        } else {
            echo "Available only for 29 days.";
        }
    }

    $stmt = $mysqli->prepare("INSERT INTO book (name, adults, children, phone, email, checkin, checkout, days, rate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("siissssis", $name, $adults, $children, $phone, $email, $checkin, $checkout, $days, $rate);

    if ($stmt->execute()) {
        echo "<script>alert('Data saved successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}


?>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div style="background-color: whitesmoke; 
width:400px; height: 450px;padding:25px; 
border-radius :10px;background-color: rgba(245, 245, 245, 0.7);float:right;position: absolute;
right: 0px;top:0px; margin-top:250px;">
        <?php


        echo "<h4>PLEASE CHECK THE INFORMATION :</h4><br>";
        echo "<br>NAME         : $name";
        echo "<br>ADULTS       : $adults";
        echo "<br>CHILDRENS    : $children";
        echo "<br>PHONE NUMBER : $phone";
        echo "<br>EMAIL ID     : $email";
        echo "<br>CHECK IN DATE : " . (isset($checkin) ? $checkin : "");
        echo "<br>CHECK OUT DATE : " . (isset($checkout) ? $checkout : "");
        global $rate;
        global $days;
        echo "<br>DAYS         :$days";
        echo "<br>RATE         :$rate";
        echo "<br>";
        ?>

        <br>
        <br>
        <center><button style="font-size: large;
            height: 50px;
            background-color: #00FA9A;
            border-radius: 5px;
            width: 200px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" type="button" onclick="window.location.href = 'pay.php'">BOOK NOW</button></center><br>
        <a href="" style="display: none;" onclick="return confirm('Are you sure you want to save the data?'); document.forms[1].submit();">Save</a>
        <input type="hidden" name="save_data" value="1">
    </div>
</form>

</html>