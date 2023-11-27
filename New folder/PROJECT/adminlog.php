
<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["loggedin"] = true;
        header("Location: secure-page.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOG</title>
    <link rel="stylesheet" href="style.css">

<style>
        .adf {
            width: 350px;
            background-color: rgba(245, 245, 245, 0.7);
            margin: 200px auto;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .btn {
            width: 100px;
            height: 45px;
            padding: 10px;
            font-size: large;
            font-weight: bolder;
            background-color: black;
            border-radius: 10px;
            color: white;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<header class="header">
    <a href="#" class="logo" style="color: #002147;">HMS<br></a>
    <div class="dropdown">
        <button class="dropbtn">LOGOUT</button>
        <div class="dropdown-content">
            <a href="logout.php">SignOut</a>
        </div>
    </div>
</header>
<div style="max-height: 700px; overflow: auto;">
    <form action="admin.php" method="POST">
        <div class="adf">
            <h2>ADMIN LOG</h2><br><br>
            <label for="email">E-MAIL</label>
            <input type="email" name="email" required><br><br>
            <label for="password">PASSWORD</label>
            <input type="password" name="password" required><br><br>
            <button class="btn">LOGIN</button>
        </div>
    </form>
</div>
</body>
</html>