<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>予約かご</title>
</head>
<body>
    <?php
    if(!empty($_SESSION['book'])) {
    ?>
    <table>  
        <th>タイトル</th> 
        <?php
        foreach ($_SESSION['book'] as $id => $book){
        ?>
        <tr>
            <td><?= $book['name'] ?></td>
            <td><a href="cart_delete.php?id=<?= $id ?>">削除</a></td>  
        </tr>
        <?php
        }
        ?>
        <a href="./borrow_in.php">借りる</a>
    </table>
    <?php
    } else {
    ?>
        カートに本がありません。<br>
        <a href="./bookList.php">topへ</a>
        
    <?php
    }
    ?>
</body>
</html>