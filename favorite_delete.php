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
                'mysql:dbname=books2;host=localhost;charset=utf8mb4',
                'phpuser2',
                '1234');
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (Exception $e) {
                echo '<span class="error">エラーがありました。</span><br>';
                echo $e->getMessage();
                exit();
            }
            $sql = "delete from favorite where customer_id = :customer_id and book_id = :book_id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
            $stm->bindValue(':book_id', !empty($_REQUEST['id']), PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            ?>
        <a href="./bookList.php">TOPへ戻る</a><br>
        お気に入りから本を削除しました。
    <?php
    } else {
    ?>
    <a href="./bookList.php">TOPへ戻る</a><br>
        お気に入りから本を削除するには、ログインしてください。
    <?php
    }
    ?>
</body>
</html>