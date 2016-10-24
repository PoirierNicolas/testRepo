<?php

include 'pdo.php';
function createDb($newDb)
{
	$connection = PDOConnection();
	$result = $connection->query('CREATE DATABASE '.$newDb.'');
	$connection->query('CREATE TABLE '.$newDb.'.info (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT)');
	return ($result);
}
?>