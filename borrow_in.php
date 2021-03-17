<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>予約確認画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php require 'menu.php'; ?>
	
	<?php
		if(!empty($_SESSION["book"])){
			printf("氏名 : %s様<br> あなたのID : %s<br>",
		
		$_SESSION["customer"]["name"]
	,	$_SESSION["customer"]["id"]
);
	
	require_once("./cart.php");
	
	if(!empty($_SESSION["book"])){?>
		<a href="borrow_out.php">予約を確定する</a>
		
		<?php
		};
	}else{
		echo "ログインしてください";
	}
	?>
</body>

</html>