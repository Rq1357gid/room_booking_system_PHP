<?php

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter the username";

    }
    elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["username"]))){
        $username_err = "username must be in letters";
    }
    else{
        $sql = "SELECT id FROM logr WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);

            $param_username = trim($_POST["username"]);

            if($stmt->execute()){
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "User name already exists";
                }
                else{
                    $username = trim($_POST["username"]);
                }
            }
            else{
                echo "Something went wrong !\n";
            }

            $stmt->close();
        }
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "please enter a password";
    }
    elseif(strlen(trim($_POST["password"]))<8){
        $password_err = "eight characters required";
    }
    else{
        $password = trim($_POST["password"]);
    }


    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "please enter confirmation password";
    }
    else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password didnt match";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO logr (username, password) VALUES(?, ?)";

        if($stmt = $mysqli->prepare($sql)){

            $stmt->bind_param("ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

        if($stmt->execute()){

            header("location: login.php");
        }
        else{
            echo "Somthing went wrong";
        }

        $stmt->close();

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
             font: 14px san-serif;
            }
    </style>
</head>
<body>
<header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS<br></a>

        </div>
    </header>
    <div class="wrapper"  style="height: 600px; margin:200px; display:block; justify-content:center; align-items:center;width: 400px;border-radius: 10px;background-color: rgba(47,79,79, 0.5);padding: 20px;">

        <h2>SIGN UP</h2>
        <P>CREATE AN ACCOUNT</P>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : '' ; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"> <?php echo $username_err; ?> </span>

        </div>

        <div class="form-group">

            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '' ; ?>" value = "<php echo $password; ?>">
                <span class="invalid-feedback"> <?php echo $password_err; ?></span>

        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : '' ; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"> <?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="SUBMIT">
        </div>
        <p>Already have an account ? <a href="login.php" class="btn btn-success">LOGIN</a></p>
        </form>
    </div>
    
</body>
</html>