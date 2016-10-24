<?php

include 'pdo.php';

function delElement($table, $element)
{
	$connection = PDOConnection();
	$result = $connection->query('ALTER TABLE '.$table.' DROP COLUMN '.$element.';');
	return $result;
}

?>