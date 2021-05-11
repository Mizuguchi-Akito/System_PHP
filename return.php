<?php
if (isset($_SESSION['customer'])) {
?>
	<table>
	<tr>
		<th>本番号</th>
        <th>タイトル</th>
        <th>借りた日付</th>
        <th>返す日付</th>
        
		</tr>
		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//SQL文を作る（プレースホルダを使った式）
		$sql = "select *, DATE_ADD(date,INTERVAL 7 DAY) AS H from book where customer_id = :customer_id ";
		//プリペアードステートメントを作る
		$stm = $pdo->prepare($sql);
		//プリペアードステートメントに値をバインドする
		$stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
		//SQL文を実行する
		$stm->execute();
		//結果の取得
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
			$id = $row['id'];
		?>
			<tr>
                <td><?= $id ?></td>
                <td><a href="detail.php?id=<?= $id ?>"><?= $row['name'] ?></a></td>
                <td><?= $row['date'] ?></td>
				<td><?= $row['H'] ?></td>
				<td><a href="return_delete.php?id=<?= $id ?>">返却</a></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
} else {
?>
	ログインしてください。
<?php
}
?>
