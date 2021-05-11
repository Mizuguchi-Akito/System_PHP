<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>商品詳細画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from book where id = :id";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':id',$_REQUEST['id'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
	foreach ($result as $row) {
        ?>
    <h1>本予約確認画面</h1>
    <h5>本の貸し出し期限は確定してから２週間です。</h5>
    <?php require 'menu.php'; ?>
		<p><img src="images/<?= $row['id'] ?>.png"></p>
		<form action="./cart_insert.php" method="post">
            <p><a href="favorite_insert.php?id=<?= $row['id'] ?>">お気に入りに追加</a></p>
			<p>書籍ID：<?= $row['id'] ?></p>
			<p>書籍名：<?= $row['name'] ?></p>
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<input type="hidden" name="name" value="<?= $row['name'] ?>">
			<p><input type="submit" value="カートに追加"></p>
		</form>
	<?php
	}
	?>
</body>

</html>