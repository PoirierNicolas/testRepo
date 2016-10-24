<?php

include 'pdo.php';

function reqLines($table)
{
	$connection = PDOConnection();
	$result = $connection->query('SELECT * FROM '.$table.';');
	return ($result);
}

function reqElements2($table)
{
	$connection = PDOConnection();
	$result = $connection->query('DESCRIBE '.$table.';');
	return $result;
}
?>