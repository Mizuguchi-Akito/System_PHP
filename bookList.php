<?php
    $link = mysqli_connect('localhost' , 'phpuser2' , '1234' , 'books2');
    if($link == null) {
        die("接続に失敗しました : ".mysqli_connect_error());
    }
    mysqli_set_charset($link , "utf-8");
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
                    <h5>本の貸し出し期限は確定してから２週間です。</h5>
                    <p>詳細を押すと本の詳細に飛べます</p>
                    <th colspan="2"></th>


                    <?php
                        $sql = 'SELECT * FROM book';
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                            echo "<br>書籍名 : {$row['name']}" , "<br>";
                            ?>
                            <p><img src="images/<?= $row['id'] ?>.png"  class="book_images"></p>
                            <a href="./datail.php?id=<?= $row['id']?>">詳細</a><br>
                            <?php
                            
                        }
                    ?>
                </table>
            </section>
        </article>
    </main><br>
    <footer id='footer'>
    Copyright c 2021 OharaToshokan All Rights Reserved.
    </footer>
</body>
</html>