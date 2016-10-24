<?php

include 'pdo.php';

function deleteTable($table)
{
	$connection = PDOConnection();
	$result = $connection->query('DROP TABLE '.$table.'');
	return $result;
}

?>