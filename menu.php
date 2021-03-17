<?php
if (!(isset($_SESSION['customer']))) {
?>
<a href="login_input.php">ログイン</a><br>
<a href="./bookList.php">TOPへ戻る</a>
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
    <a href="logout_input.php">ログアウト</a><br>
    <a href="./cart.php">カート</a><br>
    <a href="./bookList.php">TOPへ戻る</a>
<?php
}
?>
<hr>