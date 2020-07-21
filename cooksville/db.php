<?php
include('config.php');
$ongoing_query = "CREATE TABLE `dental1_key` (`id` int(11) NOT NULL, `salt` text NOT NULL ) ";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dental1_key` (`id`, `salt`) VALUES (1, '9@4b2mkN$^)M*Hzc^i(@spjm')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
?>