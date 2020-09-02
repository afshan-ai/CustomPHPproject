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



 $ongoing_query = "CREATE TABLE `dentalfor_user_screening_form` (
  `id` int(11) NOT NULL,
  `staff` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `other` varchar(250) NOT NULL,
  `question1` varchar(250) NOT NULL,
  `question2` varchar(250) NOT NULL,
  `question3` varchar(250) NOT NULL,
  `answered` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

           $ongoing_query = "ALTER TABLE `dentalfor_user_screening_form`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


        $ongoing_query = "ALTER TABLE `dentalfor_user_screening_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();