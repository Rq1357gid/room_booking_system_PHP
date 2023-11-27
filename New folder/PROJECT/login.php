<?php

session_start();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}


require_once "config.php";


$username = $password = "";
$username_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }


    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT id, username, password FROM logr WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("s", $param_username);


            $param_username = $username;


            if ($stmt->execute()) {

                $stmt->store_result();


                if ($stmt->num_rows == 1) {

                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {

                            session_start();


                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;


                            header("location: welcome.php");
                        } else {

                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {

                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }


            $stmt->close();
        }
    }


    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS<br></a>

        </div>
    </header>
    <div class="wrapper" style="height: 500px; margin:200px; display:block; justify-content:center; align-items:center;width: 400px;border-radius: 10px;background-color: rgba(47,79,79, 0.5);padding: 20px;">
        <h2>Login</h2>
        <p>Please fill in to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>
       <div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Don't have an account? <a href="reg.php" class="btn btn-success">Sign up now</a>.</p>
    </form>
</div>


    </div>
</body>

</html>