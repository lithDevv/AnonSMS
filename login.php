<?php
 session_start();
 include('config.php');
 include('headers/loggedoutbuttonmenu.php');
 $error = "";
 if (isset($_POST['submit'])) {  
      $username        = mysqli_real_escape_string($conn, $_POST['username']);  
      $password        = mysqli_real_escape_string($conn, $_POST['password']);
      
      $salted          = "$2331u023qdnjwadlnadabdabdlabhdbw".$password;
      $hashed          = hash('sha512', $salted);

      $sql             = mysqli_query($conn,"SELECT * FROM `anonsmsweb` WHERE username='$username' && password='$hashed'");  
      $num             = mysqli_num_rows($sql); 
      if ($num>0) {  
           $row                    = mysqli_fetch_assoc($sql);  
           $_SESSION["loggedin"]   = true;
           $_SESSION['USER_NAME']  = $row['username'];
           $_SESSION['API_KEY']    = $row['apikey'];
           $_SESSION['PLAN']       = $row['plan'];
           $_SESSION['API_ACCESS'] = $row['apiaccess'];
           $_SESSION['API_KEY']    = $row['apikey'];
           $_SESSION['ROLE']       = $row['role'];  
           $_SESSION['MAX_SMS']    = $row['smsperday'];
           header("Location: index.php");
      } else {
        $error = "Invalid details!";
      } 
 }  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnonSMS login</title>
</head>
<link rel="stylesheet" href="css/login.css">
<body style="background-color: #0F0D10;">
<br>
<br>
<br>
<br>
<br>
<form action="" method="post">
    <font color="white">
        <center><h1 style="font-size: 72px;line-height: 1;font-weight: 600;letter-spacing: -1.73px;text-shadow: 1px 5px 2px grey;">Login</h1></center>
    </font>
    <br>
    <br>
    <center><input  type="text"     placeholder="username" class="login_box" name="username"></center>
    <center><input  type="password" placeholder="Password" class="login_box" name="password"></center>
    <center><button type="submit" name="submit" class="submit-btn">Login</button></center>
    <br>
    <center><div class="error"><?php echo $error ?></div> </center> 
</form>
<?php
include("footers/footer.php");
?>
</body>
</html>