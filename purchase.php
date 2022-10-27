<?php 
session_start();
include("headers/loggedinbuttonmenu.php");
include("config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
</head>
<link rel="stylesheet" href="css/index.css">
<body style="background-color: #0F0D10;">
<br>
<div class="content_box">
    <div class="content_box_text">
        <b>Plans and Prices</b>
        <hr>
        <p>
            Basic Plan: 
            <br>
            <small><b>45 sms per day</b></small>
            <br>
            <small><b>Api access : false</b></small>
            <br>
            <small><b>Price : $29.99</b></small>
        </p>
        <p>
            Professional:
            <br>
            <small><b>80 sms per day</b></small>
            <br>
            <small><b>Api access: true</b></small>
            <br>
            <small><b>Price : $59.99</b></small>
        </p>
        <p>
            Enterprise:
            <br>
            <small><b>500 sms per day</b></small>
            <br>
            <small><b>Api access : true</b></small>
            <br>
            <small><b>Price : $119.99</b></small>
        </p>
        <p>
            Unlimited:
            <br>
            <small><b>unlimited sms per day</b></small>
            <br>
            <small><b>Api access: true</b></small>
            <br>
            <small><b>Price : $199.99</b></small>
        </p>
    </div>
</div>
<br>
<div class="content_box">
    <div class="content_box_text">
        <b>Information</b>
        <hr>
        <big><b>All purchases are monthly and Final</b></big>
        <br>
        <hr>
        <big><b>How do I buy?</b></big>
        <p>At this time we are only taking manual orders so join our discord and make a ticket with the following:</p>
        <p>1) Your BTC/ETH address</p>
        <p>2) What Plan you would like</p>
        <hr>
        <big><b>Payment methods</b></big>
        <hr>
        <p>At this time we only accept BTC & ETH</p>
        <p>BTC Address: bc1qu4uw5rlzpcy0yxrl5w3u74qp8ne09we035q8su</p>
        <p>ETH Address: 0xf1C828275f1231886C7815Ca0D44E8d4117a1DE4</p>
    </div>
</div>
</body>
</html>