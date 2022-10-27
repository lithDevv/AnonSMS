<?php 
session_start();
$query = "";
include("headers/loggedinbuttonmenu.php");
include("config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} else if($_SESSION['ROLE'] !== "admin") {
    header("Location: index.php");
}


if(isset($_POST["add_annc_btn"])) {
    $a               = mysqli_real_escape_string($conn, $_POST["add_annc_box"]); 
    $announcment     = filter_var($a, FILTER_SANITIZE_STRING);
    $query = mysqli_query($conn,"INSERT INTO `announcments`(`announcments`) VALUES ('$announcment')");
} else if(isset($_POST["del_annc_btn"])) {
    $announcment = mysqli_real_escape_string($conn, $_POST["del_annc_box"]);
    $query = mysqli_query($conn, "DELETE FROM `announcments` WHERE `announcments`='$announcment'");
} else if(isset($_POST["del_user_btn"])) {
    $user  = mysqli_real_escape_string($conn, $_POST["del_user_box"]);
    $query = mysqli_query($conn, "DELETE FROM `anonsmsweb` WHERE `username`='$user'");
} else if(isset($_POST["get_user_data_button"])) {
    $user = mysqli_real_escape_string($conn, $_POST["get_user_data_box"]);
    $query = mysqli_query($conn, "SELECT * FROM `anonsmsweb` WHERE username='$user'");
    $row   = mysqli_fetch_assoc($query); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/admin.css">
<body style="background-color: #0F0D10;">
<br>
<br>
<br>
<br>
<div class="content_box">
    <form action="" method="post">
        <div class="content_box_text">
            <b>Announcments</b>
            <hr>
            <input type="text" class="textbox" name="add_annc_box" placeholder="Enter Announcment">
            <button class="btn" name="add_annc_btn">Add</button>
            <hr>
            <input type="text" class="textbox" name="del_annc_box" placeholder="Enter Announcment">
            <button class="btn" name="del_annc_btn">Delete</button>
        </div>
    </form>
</div>
<br>
<div class="content_box">
    <form action="" method="post">
    <div class="content_box_text">
        <b>Users</b>
        <hr>
        <input type="text" class="textbox" name="del_user_box" placeholder="Enter User">
        <button class="btn" type="submit" name="del_user_btn">Delete</button>
        <hr>
        <b>Plan Update</b>
        <hr>
        <input type="text" class="textbox" name="update_user_plan_box" placeholder="Enter User">
        <input type="text" class="textbox" name="updated_user_plan" placeholder="Enter plan">
        <button class="btn" type="submit" name="update_user_plan_btn">Update</button>
        <hr>
        <b>Get User Data</b>
        <hr>
        <input type="test" class="textbox" name="get_user_data_box" placeholder="Enter User">
        <button class="btn" type="submit" name="get_user_data_button" >Submit</button>
    </div>
    </form>
</div>
<br>
<div class="content_box">
        <div class="content_box_text">
            <b>User data</b>
            <hr>
            <p>Api key : <?php  if(isset($_POST["get_user_data_button"])) { echo $row["apikey"];}?></p>
            <br>
            <p>User : <?php if(isset($_POST["get_user_data_button"])) { echo $row["username"]; }?></p>
            <br>
            <p>Plan : <?php if(isset($_POST["get_user_data_button"])) { echo $row["plan"]; }?></p>
            <br>
            <p>Api Access : <?php if(isset($_POST["get_user_data_button"])) { echo $row["apiaccess"]; }?></p>
            <br>
            <p>Role : <?php if(isset($_POST["get_user_data_button"])) { echo $row["role"]; }?></p>
            <br>
            <p>Sms per day : <?php if(isset($_POST["get_user_data_button"])) { echo $row["smsperday"]; }?></p>
            <br>
            <p>IP Address : <?php if(isset($_POST["get_user_data_button"])) { echo $row["ip"]; }?></p>
            <br>
        </div>
    </div>
</body>
</html>