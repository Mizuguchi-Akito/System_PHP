<?php

$user = "phpuser2";
$password = "1234";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMURATE_PREPARES => false,
    PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
];
$dbh = new PDO('mysql:host=localhost;dbname=sample_db', $user,$password,$opt);
?>