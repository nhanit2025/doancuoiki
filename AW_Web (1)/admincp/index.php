<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('Location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>

    <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>
    <?php 
        include("config/config.php");
        include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");        
        include("modules/footer.php");
    ?>
</body>
</html>