<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>未返却一覧</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php require 'menu.php'; ?>
	<?php
	if (isset($_SESSION['not_returned'])) {
		//MySQLデータベースに接続する
		require 'db_connect.php';

		//SQL文を作る（プレースホルダを使った式）
		$sql = "insert into book values(:customer_id,:book_id)";
		//プリペアードステートメントを作る
		$stm = $pdo->prepare($sql);
		//プリペアードステートメントに値をバインドする
		$stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
		$stm->bindValue(':book_id', $_REQUEST['id'], PDO::PARAM_STR);
		//SQL文を実行する
		$stm->execute();
	?>
		手続きが完了しました。
		<hr>
	<?php require 'return.php';
	} else {
	?>
		ログインしてください。
	<?php
	}
	?>
</body>

</html>