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




         

         $ongoing_query = "ALTER TABLE `dentalfor_user_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;
COMMIT";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();