<?php session_start(); ?>

<?php
    unset($_SESSION['customer']);

    try {
        $pdo = new PDO(
            'mysql:dbname=testdb;host=localhost;charset=utf8mb4',
            'root',
            '');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        echo '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
        exit();
    }

    $sql = "select * from customer where login = :login and password = :password";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':login', $_POST['login'],PDO::PARAM_STR);
    $stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $_SESSION['customer'] = [
            'id' => $row['id'], 'name' =>$row['name'],
            'password' => $row['password']
        ];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <?php
        if (isset($_SESSION['customer'])) {
            echo 'ログインしました。';
        } else {
            echo 'ログイン名またはパスワードが違います。';
        }
    ?>

</body>
</html>