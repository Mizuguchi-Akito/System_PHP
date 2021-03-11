<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大原図書館</title>
</head>
<body>

<h1>大原図書館予約サイト</h1>
<h4>本一覧</h4>
<?php
require_once 'function.php';
try {
    $user = "phpuser2";
    $password = "1234";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=books2',$user,$password,$opt);
    $sql = 'SELECT id,name author FROM book';
    $statement = $dbh->query($sql);

    while($row = $statement->fetch()) {
        // echo "id:" . str2html($row[0]) . "<br>";
        echo "書籍名:" . str2html($row[1]) . "<br><br>";
    }
} catch (PDOException $e){
    echo "エラー!:" . str2html($e->getMessage()) . "<br>";
    exit;
}
?>
</body>
</html>