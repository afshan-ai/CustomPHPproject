<?php
$host = 'appfordentists-db.cxypqkxdaqf2.ca-central-1.rds.amazonaws.com';
$port = 3306;
$db   = 'appfddb';
$user = 'appfddbuser';
$pass = '1Wtch0nUT3am';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
         
         $ongoing_query = "Truncate TABLE `dentalsb_insurance`";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

     

         

        

        