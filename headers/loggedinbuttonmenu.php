<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="stylesheet" href="css/buttonmenu.css">
<body>
    <div class="menu">
        <a href="index.php">home</a>
        <a href="logout.php">logout</a>
        <a href="purchase.php">purchase</a>
        <a href="https://discord.gg/4PESdPsUd4">discord</a>
        <a href="https://discord.gg/4PESdPsUd4">Ticket</a>
        <?php 
        if($_SESSION['ROLE'] === 'admin') {
            $admin_page = "admin.php";
            echo "<a href=\"{$admin_page}\">admin</a>";
        }
        ?>
    </div>
</body> 
</html>