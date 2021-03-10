<?php
try {
    $user = "phpuser2";
    $password = "1234";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MSSQL_ATTR_MULTI_STATEMENTS =>false,

    ];
    $sbh = new  PDO('mysql:host=localhost;dbname=sample_db', $user,$password,$opt);
    var_dump($dbh);
}catch(PDOException $e){
    echo "エラー:" . $e>getMessage() . "<br>";
    exit;
}
?>