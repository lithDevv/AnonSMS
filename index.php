<?php 
session_start();
include("config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} else if($_SESSION['ROLE'] === 'troll') {
    header("Location: troll.php");
}

if(isset($_POST['send_sms_btn'])) {
    $message    = $_POST["sms"];
    $number     = $_POST["number"];
    $ammount    = $_POST["ammount"];
    $key        = $_SESSION["API_KEY"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<link rel="stylesheet" href="css/index.css">
<body style="background-color: #0F0D10;">
<br>
<?php include("headers/loggedinbuttonmenu.php"); ?>
<br>
<div class="content_box">
    <div class="content_box_text">
        <b>Announcments</b>
        <hr>
        <?php
        $q = mysqli_query($conn, "SELECT * FROM `announcments` WHERE 1");
        $row2 = mysqli_fetch_assoc($q);  
        if($row2>0) {
            $announcments = $row2["announcments"];
            echo "<center><p>$announcments</p></center>";
        } else {
            echo "<center><p>No announcments for today</p></center>";
        }   
        ?>
    </div>
</div>
<br>
<div class="content_box">
    <div class="content_box_text">
        <b>SMS Bomb Panel</b>
        <br>
        <hr>
        <br>
        <form action="" method="post">
            <center><input type="text" class="sms_box" placeholder="Enter Message" name="sms"></center>
            <center><input type="text" class="sms_box" placeholder="Enter Number"  name="number"></center>
            <center><input type="text" class="sms_box" placeholder="Enter Ammount" name="ammount"></center>
            <center><button class="send_btn" name="send_sms_btn" type="submit">Send</button></center>
        </form>
    </div>
</div>
<br>
<div class="content_box">
<div class="content_box_text">
    <b>Account data</b>
    <hr>
    <small>User : <?php echo $_SESSION['USER_NAME'];?></small>
    <br>
    <small>Plan : <?php echo $_SESSION['PLAN'];?></small>
    <br>
    <small>Api access : <?php echo $_SESSION['API_ACCESS'];?></small>
    <br>
    <small>Sms left : <?php echo $_SESSION['MAX_SMS'];?></small>
    <br>
    <?php 
        if($_SESSION['API_ACCESS'] === "True") {
            echo "<small>Api Key : ".$_SESSION['API_KEY'];
        }
    ?>
    </div>
</div>
<br>
<br>
<br>
<?php
include("footers/homepage.php");
?>
</body>
</html>