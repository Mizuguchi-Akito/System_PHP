<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>予約確定画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'menu.php'; ?>
	<?php
		if(empty($_SESSION["customer"]) || empty($_SESSION["book"])){
            echo "ログインしていないか、カートに商品がありません";
		}else{
            $customerId = $_SESSION["customer"]["id"];
			$pdo;
			require_once("db_connect.php");
            echo "予約しました<br>";
            echo "貸し出し期限は２週間です。";

            // echo "実行しました";
       
                $dataStm;
                $dataSql = "
                UPDATE book SET customer_id = :customer_id, date = CURRENT_DATE() WHERE id = :product_id;
                ";
                
                foreach($_SESSION["book"] as $key => $value){
                    $dataStm = $pdo->prepare($dataSql);
                    // echo "aaaaa";
                    $dataStm->bindValue(":product_id" , $key , PDO::PARAM_INT);
                    // $dataStm->bindValue(":product_id2" , $key , PDO::PARAM_INT);
                    $dataStm->bindValue(":customer_id" , $customerId , PDO::PARAM_INT);
                    // $dataStm->bindValue(":date" , date('Y-m-d') , PDO::PARAM_STR);
                    
                    
                    $dataStm->execute();
                }
                unset($_SESSION["book"]);

            
            // if($purStm->execute()){
            
			// }else{
			// 	echo "予約に失敗しました";
			// }
		}
	?>
</body>

</html>