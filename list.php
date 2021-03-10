<?php
require_once 'function.php';
try {
    $user = "phpuser2";
    $password = "1234";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        // FETCH::FWTCH_ASSOC,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=sample_db',$user,$password,$opt);
    $sql = 'SELECT title, author FROM books';
    $statement = $dbh->query($sql);

    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "書籍名:" . str2html($row['title']) . "<br>";
        // echo "書籍名:" . str2html($row['id']) . "<br><br>";
    }
} catch (PDOException $e){
    echo "エラー!:" . str2html($e->getMessage()) . "<br>";
    exit;
}
?>