<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PAY</title>
</head>
<style>
    .pay{
        width: 400px;
        height: 500px;
        padding: 25px;
        background-color: whitesmoke;
        margin-top: 200px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        background-color: rgba(245, 245, 245, 0.7);

}
  form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  select {
    width: 250px;
    margin-bottom: 10px;
  }
  .but{
    width: 330px;
    border-radius: 10px;
    height: 40px;
    padding: 5px;
    text-size-adjust: large;
    background-color: #004040;
    color: white;
  }
  .pay{
    margin-left: 100px;
  }
</style>

<body>
<header class="header">
        <a href="#" class="logo" style="color: #002147;">HMS<br></a>
        <h4 class="my-5" style="color: #002147; font-size:large;">PAY</h4>
        <div class="dropdown">
            <button class="dropbtn">LOGOUT</button>
            <div class="dropdown-content">
                <a href="logout.php" class="btn btn-danger">Sign Out</a>
            </div>
        </div>
    </header>
    <div style="max-height: 600px; overflow:auto;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="pay">
        <b><p>Payment details</p></b><br>
        <label for="card_name">CARD NAME</label><input type="text" name="name"><br>
        <label for="card_number">CARD_NUMBER</label><input type="text"><br>
        <label for="month">MONTH</label><input type="text"><br>
        <label for="YEAR">YEAR</label><input type="text"><br>
        <label for="rs">PAY</label><input type="text" name="rs"><br><br><br><br>
        <button class="but">PAY</button>

    </div>
    </form>
    </div>
    <div class="card">

    </div>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div style="background-color: whitesmoke; 
width:400px; height: 450px;padding:25px; 
border-radius :10px;background-color: rgba(245, 245, 245, 0.7);float:right;position: absolute;
right: 0px;top:0px; margin-top:250px;">
            <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = $_POST['name'];
        $rs = $_POST['rs'];

        echo "<div style='background-color: whitesmoke; width: 400px; height: 200px; padding: 25px; border-radius: 10px; background-color: rgba(245, 245, 245, 0.7); float: right; position: absolute; right: 0; top: 0; margin-top: 150px;'>";
        echo "<h3>Thank you</h3>";
        echo "<br>CARD NAME: $name";
        echo "<br>RUPEES: $rs";
        echo "<center><br>Paid successfully</center>";
        echo "</div>";
    }
    ?>
        </div>
    </form>
    </div>
</body>
</html>