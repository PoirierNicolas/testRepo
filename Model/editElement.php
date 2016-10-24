<?php

include 'pdo.php';

function editElement($table, $element, $newElement, $newType, $newNull)
{
	if($newNull=="YES")
		$newNull="NULL";
	else
		$newNull="NOT NULL";
	$connection = PDOConnection();
	$result = $connection->query('ALTER TABLE '.$table.' CHANGE COLUMN '.$element.' '.$newElement.' '.$newType.' '.$newNull.';');
	return $result;
}

?>