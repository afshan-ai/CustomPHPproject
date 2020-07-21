<?php
include('../dbinfo.php');


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$ongoing_query = "CREATE TABLE `dental1_key` (`id` int(11) NOT NULL, `salt` text NOT NULL ) ";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dental1_key` (`id`, `salt`) VALUES (1, '9@4b2mkN$^)M*Hzc^i(@spjm')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
?>