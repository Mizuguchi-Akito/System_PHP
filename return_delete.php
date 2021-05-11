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
	if (isset($_SESSION['customer'])) {
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "UPDATE book SET customer_id = NULL, date = null WHERE id = :book_id;";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':book_id', $_REQUEST['id'], PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	?>
		返却手続きが完了しました。
		<hr>
	<?php
	} else {
	?>
		ログインしてください。
	<?php
	}
	require 'return.php';
	?>
</body>

</html>