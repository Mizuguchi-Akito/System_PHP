<?php //ログイン後は表示されないように処理
if (!(isset($_SESSION['customer']))) {
?>
<a href="login_input.php">ログイン</a>
<?php
}
?>

<?php //ログイン前は表示されないように処理
if (isset($_SESSION['customer'])) {
?>
    <a href="logout_input.php">ログアウト</a>
<?php
}
?>
<hr>