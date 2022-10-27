<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("config.php");
$time = date('g:i:A');
if($time === "1:00:PM") {
    $query            = mysqli_query($conn,"SELECT * FROM `anonsmsweb` WHERE 1");  
    $num                     = mysqli_num_rows($query);  
    $row                     = mysqli_fetch_assoc($get_plan);
    $plan                    = $row1['plan'];
    $smsperday               = $row1['smsperday'];
    mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='5' WHERE `plan` = 'free'");
    mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='45' WHERE `plan` = 'basic'"); 
    mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='80' WHERE `plan` = 'pro'");
    mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='500' WHERE `plan` = 'enterprise'");
    mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='50000' WHERE `plan` = 'unlimited'");
}
function x($string) {
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}
$method = array("spam", "phish");  
$plans  = array("unlimite", "premium", "free");

if (!isset($_GET["key"])) {
    die("<p>Please enter an API key!");
} else if(!isset($_GET["message"])) {
    die("<p>Please enter a message!");
} else if(!isset($_GET["ammount"])) {
    die("<p>Please enter an ammount!");
} else if(!isset($_GET["number"])) {
    die("<p>Please enter a number to spam");
} 

$key        =  x($_GET["key"]);
$message    =  x($_GET["message"]);
$ammount    =  x($_GET["ammount"]);
$number     =  x($_GET["number"]);

$sql             = mysqli_query($conn,"SELECT * FROM `anonsmsweb` WHERE apikey='$key'");
$num             = mysqli_num_rows($sql);

function send_message($message, $number) {    
    require_once "vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPDebug  = 2; 
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls"; 
    $mail->Host = "smtp.outlook.com";
    $mail->Port = 587;
    $mail->Encoding = '7bit';
     
    $mail->Username   = "";
    $mail->Password   = "";
    $mail->Body = "$message";
     
    $mail->AddAddress( "$number" );
    try {
        $mail->send();
        echo "Messages sent!";
    } catch (Exception $e) {
        
    }
} 

if ($num>0) {  
     $row       = mysqli_fetch_assoc($sql);
     $plan      = $row['plan'];
     $maxsms    = $row['smsperday'];
     $newsms    = $maxsms - 1;
     if(strpos($number, '@') === false) {
         echo "Please enter numbers gateway"; 
    } else if($maxsms === '0') {
        echo "You have reached max messages for today!";
    } else {
        for($i = 0; $i != $ammount; $i++) {
            //send_message($message, $number);
            $update_maxsms = mysqli_query($conn, "UPDATE `anonsmsweb` SET `smsperday`='$newsms' WHERE apikey='$key'");
        }
    }
} else {
  echo "Invalid API key";
} 
 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnonSMS API</title>
</head>
<body>

</body>
</html>
