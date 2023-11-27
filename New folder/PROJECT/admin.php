<?php
require_once "config.php";
$result = $mysqli->query("SELECT * FROM book");


$totalRooms = 10;
$availableRooms = $totalRooms;

$currentDate = time();

while ($row = $result->fetch_assoc()) {
    
    $checkoutDate = strtotime($row['checkout']);
    
    if ($checkoutDate >= $currentDate) {
        $availableRooms--;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOR ADMIN</title>
    <link rel="shortcut icon" href="img/admin1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: rgba(245, 245, 245, 0.7);
        border-radius: 10px;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .row {
        margin-top: 200px;
        margin-left: 100px;
        display: flex;
        align-items: center;
    }
    .table-container {
            max-height: 400px;
            overflow: auto;
        }
    .boxc1{
        height: 100px;
        width: 500px;
        border-radius: 15px;
        background-color: rgba(245, 245, 245, 0.7);
        padding: 30px;
        font-size: xx-large;
    }
    .boxc2{
        margin-left: 10px;
        height: 100px;
        width: 500px;
        border-radius: 15px;
        padding: 30px;
        font-size: xx-large;
        background-color: rgba(245, 245, 245, 0.7);
    }
    
    .box {
        color: #f2f2f2;
        font-weight: bold;
        font-size: large;
        background-color: #06042c;
        border-radius: 10px;
        padding: 10px;
        margin-top: 20px;
    }
</style>
<body>
<header class="header">
    <a href="#" class="logo" style="color: #002147;">HMS<br></a>
    <div class="dropdown">
        <button class="dropbtn">LOGOUT</button>
        <div class="dropdown-content">
            <a href="logout.php" class="btn btn-danger">Sign Out</a>
        </div>
</header>

<div class="row">
    <p class="boxc1">TOTAL ROOMS &nbsp;|&nbsp; <?php echo $totalRooms; ?></p>
    <p class="boxc2">AVAILABILITY &nbsp;|&nbsp; <?php echo $availableRooms; ?></p>
</div>

<p class="box">&emsp;Booked data :</p>

<?php
// Check if all rooms are booked
if ($availableRooms <= 0) {
    echo "<p>All rooms are booked. No rooms available.</p>";
} else {
    ?>
   <div class="table-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Adults</th>
            <th>Children</th>
            <th>Phone Number</th>
            <th>Email ID</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
            <th>Days</th>
            <th>Rate</th>
        </tr>
        <?php
        $result->data_seek(0); // Reset the result pointer to the beginning
        while ($row = $result->fetch_assoc()) {
            // Filter out expired bookings
            $checkoutDate = strtotime($row['checkout']);
            
            if ($checkoutDate >= $currentDate) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['adults'] . "</td>";
                echo "<td>" . $row['children'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['checkin'] . "</td>";
                echo "<td>" . $row['checkout'] . "</td>";
                echo "<td>" . $row['days'] . "</td>";
                echo "<td>" . $row['rate'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
<?php } ?>

</body>
</html>
