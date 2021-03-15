<?php
if (!(isset($_SESSION['customer']))) {
?>
<a href="login_input.php">ログイン</a>
<?php
}
?>

<?php
if (isset($_SESSION['customer'])) {
?>
    <a href="logout_input.php">ログアウト</a>
<?php
}
?>
<hr>