<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>予約かご</title>
</head>
<body>
    
    <?php 
    unset($_SESSION['book'][$_REQUEST['id']]);
    ?>
    かごから商品を削除しました。
    <hr>
    <?php
    require 'cart.php';
    ?>
</body>
</html>