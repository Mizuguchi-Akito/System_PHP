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
            
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    } else {
    ?>
        カートに本がありません。
    <?php
    }
    ?>
</body>
</html>