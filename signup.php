<?php 
include("config.php");
include("headers/loggedoutbuttonmenu.php");
session_start();
$error_user_already_exists = "";
function get_random_api_key($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if(isset($_POST["submit"])) {
    $key = get_random_api_key();

    $username        = mysqli_real_escape_string($conn, $_POST['username']);  
    $password        = mysqli_real_escape_string($conn, $_POST['password']);
    $salted          = "$2331u023qdnjwadlnadabdabdlabhdbw".$password;
    $hashed          = hash('sha512', $salted);
    $check_user      = mysqli_query($conn,"SELECT * FROM `anonsmsweb` WHERE username='$username' && password='$hashed'");  
    $num             = mysqli_num_rows($check_user);

    if($num>0) {
        $error_user_already_exists = "user already exists!";
    } else {
        $error_user_already_exists = "user register successfully!";
        $ip                        = $_SERVER['REMOTE_ADDR'];
        $sql                       = mysqli_query($conn,"INSERT INTO `anonsmsweb`(`apikey`, `username`, `password`, `plan`, `apiaccess`, `role`, `smsperday`, `ip`) VALUES ('$key','$username','$hashed','free', 'false', 'user', '5', '$ip')");
    }  
}
?>
<link rel="stylesheet" href="css/signup.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body style="background-color: #0F0D10;">
<br>
<br>
<br>
<br>
<br>
<font color="white">
        <center><h1 style="font-size: 72px;line-height: 1;font-weight: 600;letter-spacing: -1.73px;text-shadow: 1px 5px 2px grey;">Signup</h1></center>
</font>
<br>
<br>
<form action="" method="post">
    <center><input  type="text"     placeholder="username" class="signupbox" name="username"></center>
    <center><input  type="password" placeholder="Password" class="signupbox" name="password"></center>
    <center><button type="submit" name="submit" class="submit-btn">signup</button></center>
    <br>
    <center><div class="error"><?php echo $error_user_already_exists ?></div> </center> 
</form>
<?php
include("footers/footer.php");
?>
</body>
</html>