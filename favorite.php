<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>お気に入り</title>
</head>
<body>
    
    <?php
    if(isset($_SESSION['customer'])){
    ?>
    <table>
        <th>タイトル</th>
        <th></th>
        <?php
            unset($_SESSION['customer']);

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
        
            $sql = "select * from favorite where customer_id = :customer_id and book_id = :book_id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':customer_id', $_POST['customer']['id'],PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                    $id = $row['id'];
            
        ?>

        <tr>
            <td><?= $row['name'] ?></td>
            <td><a href="">削除</a></td>
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