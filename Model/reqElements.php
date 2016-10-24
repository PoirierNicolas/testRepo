<?php

include 'pdo.php';

function reqElements($table)
{
	$connection = PDOConnection();
	$result = $connection->query('DESCRIBE '.$table.';');
	return $result;
}

?>