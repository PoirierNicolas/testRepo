<?php

include 'pdo.php';

function choiceDb($choiceDb)
{
	$connection = PDOConnection();
	$result = $connection->query('USE '.$choiceDb.'');
	return ($result);
}
?>