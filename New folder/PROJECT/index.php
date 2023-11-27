<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .flip-box{
        background-color: transparent;
        border: 1px solid #f1f1f1;
        perspective: 1000px;
        width: 500px;
        height: 350px;
        padding: 25px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 200px;
        border-radius: 10px;
        }
.flip-box-inner{
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
}
.flip-box:hover .flip-box-inner{
    transform: rotateY(180deg);
}
.flip-box-front{
    background-color: lightgray;
    color: whitesmoke;
}
.flip-box-back{
    background-color: lightgray;
    color: black;
    transform: rotateY(180deg);
}
</style>
<body>
    <header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS</a>
        <div class="dropdown">
  <button class="dropbtn">LOGIN</button>
  <div class="dropdown-content">
  <a href="login.php">LOGIN</a>
  <a href="reg.php">SIGN UP</a>
  <a href="adminlog.php">FOR ADMIN</a>
  </div>

    </header>
    <?php
            $var ="hello";
            ?>   

            <div class="flip-box">
                <div class="flip-box-inner">
                    <div class="flip-box-front">
                        <img src="img/img_index.jpg" alt="index">

                    </div>
                    <div class="flip-box-back">
                        <h1>HELLO !</h1>
                    </div>
                </div>
            </div>
</body>
</html>