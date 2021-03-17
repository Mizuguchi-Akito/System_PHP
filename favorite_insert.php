<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>お気に入り</title>
</head>
<body>
    <?php 
    if(isset($_SESSION['customer'])){
        try {
            $pdo = new PDO(
                'mysql:dbname=book;host=localhost;charset=utf8mb4',
                'book',
                'bookpass');
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo '<span class="error">エラーがありました。</span><br>';
            echo $e->getMessage();
            exit();
        }
        $sql = "insert into favorite values(:customer_id,:book_id)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
        $stm->bindValue(':book_id', !empty($_REQUEST['id']), PDO::PARAM_STR);
        $stm->execute();
    ?>
        お気に入りに本を追加しました。
        <hr>
    <?php require 'favorite.php';
    } else {
    ?>
        お気に入りに本を追加するにはログインしてください。
    <?php
    }
    ?>
</body>
</html>