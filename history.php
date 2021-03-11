<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>貸出履歴</title>
</head>
<body>
    
    <?php
    try {
        $pdo = new PDO(
            'mysql:dbname=testdb;host=localhost;charset=utf8mb4',
            'root',
            '');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        echo '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
        exit();
    }
     
    if(!empty($_SESSION['customer'])){
        
    }
    ?>
</body>
</html>