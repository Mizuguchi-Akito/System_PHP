<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>お気に入り</title>
</head>
<body>
    <a href="./bookList.php">TOPへ戻る</a><br>
    <h2>お気に入りの本一覧</h2>
    <?php
    if(isset($_SESSION['customer'])){
    ?>
    <table>
        <?php
            // unset($_SESSION['customer']);
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
                $sql = "select * from favorite, book where favorite.customer_id = book.id";
                $stm = $pdo->prepare($sql);
                $stm->bindValue('favorite.customer_id', !empty($_SESSION['customer']), PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                    $id = $row['id'];
        ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><a href="favorite_delete.php">削除</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <?php
    } else {
    ?>
    お気に入りを表示するには、ログインしてください。
    <?php
        }
    ?>
</body>
</html>