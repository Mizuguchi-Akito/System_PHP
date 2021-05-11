<?php session_start(); ?>
<?php
    // $link = mysqli_connect('localhost' , 'phpuser2' , '1234' , 'books2');
    // if($link == null) {
    //     die("接続に失敗しました : ".mysqli_connect_error());
    // }
    // mysqli_set_charset($link , "utf-8");
    require 'db_connect.php';
		//SQL文を作る（プレースホルダを使った式）
	
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>TOP画面</title>
</head>
<body>
    <main>
        <article>
            <section>
                <table>
                    <h2>図書館の本一覧</h2>
                    <?php require 'menu.php'; ?>
                    <?php 
                    if(!empty($_SESSION['customer'])){
                        $sql = "select count(id) AS C  from book where customer_id = :customer_id and date <= DATE_SUB(CURRENT_DATE , INTERVAL 7 DAY )";
                        $stm = $pdo->prepare($sql);
                        $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
                        $stm->execute();
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        if($result[0]['C'] > 0){
                            echo '<h2 class="redn">未返却の本があります。</h2>';
                        }
                    }?>
                    <h5>本の貸し出し期限は確定してから２週間です。</h5>
                    <p>詳細を押すと本の詳細に飛べます</p>
                    <th colspan="2"></th>


                    <?php
                        //プリペアードステートメントを作る
                        $sql = 'SELECT * FROM book';
                        $stm = $pdo->prepare($sql);
                        $stm->execute();
                        // $result = fechAll($link, $sql);
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            if(!$row['customer_id']){
                                echo "<br>書籍名 : {$row['name']}" , "<br>";
                                ?>
                                <p><img src="images/<?= $row['id'] ?>.png"  class="book_images"></p>
                                <a href="./datail.php?id=<?= $row['id']?>">詳細</a><br>
                                <?php
                                }
                        }
                    ?>
                </table>
            </section>
        </article>
    </main><br>
    <footer id='footer'>
        <hr>
    Copyright c 2021 OharaToshokan All Rights Reserved.
    </footer>
</body>
</html>