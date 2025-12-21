<?php
session_start();
include("admincp/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlwaysWonder</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    

    <?php 
        include("admincp/config/config.php");
        include("pages/header.php");
        include("pages/section.php");
        include("pages/main.php");
        include("pages/footer.php");
    ?>
    
    <script src="/AW_Web/js/add.js"></script>
    <script src="/AW_Web/js/header.js"></script>
    <script src="/AW_Web/js/menu.js"></script>
</body>
</html>