<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>商品詳細画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'menu.php'; ?>
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
		<p><img src="images/<?= $row['id'] ?>.png"></p>
		<form action="" method="post">
			<p>書籍ID：<?= $row['id'] ?></p>
			<p>書籍名：<?= $row['name'] ?></p>
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<input type="hidden" name="name" value="<?= $row['name'] ?>">
			<p><input type="submit" value="カートに追加"></p>
		</form>
		<p><a href="./.php?id=<?= $row['id'] ?>">お気に入りに追加</a></p>
	<?php
	}
	?>
</body>

</html>