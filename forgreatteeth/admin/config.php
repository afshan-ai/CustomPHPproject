<?php
include('../../dbinfo.php');


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


 $ongoing_query1 = "SELECT * from dentalfor_key";

        $statement1 = $pdo->prepare($ongoing_query1);

        $statement1->execute();
        $result2 = $statement1->fetch();
$salt=$result2->salt;

