<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>貸出履歴</title>
</head>
<body>
    
    <?php

    if(isset($_SESSION['customer'])){
        try {
            $pdo = new PDO(
                'mysql:dbname=testdb;host=localhost;charset=utf8mb4',
                'book',
                'bookpass');
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (Exception $e) {
            echo '<span class="error">エラーがありました。</span><br>';
            echo $e->getMessage();
            exit();
        }
        
        $sql = "select id from borrow where customer_id = :customer_id";
        $stm->bindValue(':customer_id',$_SESSION['customer']['id'],PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $row){
            $sql1 = "select book.id as book_id, name count from book where book_id = book.id";
					$stm1 = $pdo->prepare($sql1);
					$stm1->bindValue(':book_id',$row['id'],PDO::PARAM_INT);
					$stm1->execute();
					$result1 = $stm1->fetchAll(PDO::FETCH_ASSOC); 
    ?>
    <table>
            <tr>
                <th>タイトル</th>
            </tr>
            <tr>
                <td><?= $row2['name'] ?></td>
            </tr>
    </table>
    <?php
        }
    }
    ?>
</body>
</html>