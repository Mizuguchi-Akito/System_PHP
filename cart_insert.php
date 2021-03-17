<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>買い物かご画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require 'menu.php'; ?>
    <a href="./bookList.php">TOPへ戻る</a>
	<?php
	$id = $_REQUEST['id'];
	if (!isset($_SESSION['book'])) {
		$_SESSION['book'] = [];
	}
	$count = 0;
	// if (isset($_SESSION['book'][$id])) {
	// 	$count = $_SESSION['book'][$id]['count'];
	// }
	$_SESSION['book'][$id] = [
		'name' => $_REQUEST['name'],
		// 'price' => $_REQUEST['price'],
		// 'count' => $count + $_REQUEST['count']
	];
	?>
	<p>カートに商品を追加しました。</p>
    <hr>
    <!-- <?= var_dump($_SESSION['']) ?> -->
	<?php
	require 'cart.php';
	?>
</body>

</html>