<?php

include 'pdo.php';

function deleteDb($delDb)
{
	$connection = PDOConnection();
	$result = $connection->query('DROP DATABASE '.$delDb.'');
	return ($result);
}
?>