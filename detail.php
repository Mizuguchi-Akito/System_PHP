<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>本一覧画面</title>
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
		<p><img src="image/<?= $row['id'] ?>.jpg"></p>
		<form action="return_insert.php" method="post">
			<p>本番号：<?= $row['id'] ?></p>
			<p>タイトル：<?= $row['name'] ?></p>
			<p>期日：<?= $row['date']+7 ?></p>
					<?php
					for ($i = 1; $i <= 10; $i++) {
					?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php
					}
					?>
				</select></p>
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<input type="hidden" name="name" value="<?= $row['name'] ?>">
			<input type="hidden" name="price" value="<?= $row['price'] ?>">
			<p><input type="submit" value="カートに追加"></p>
		</form>
		<p><a href="return_insert.php?id=<?= $row['id'] ?>">借りる</a></p>
	<?php
	}
	?>
</body>

</html>