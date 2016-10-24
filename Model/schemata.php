<?php
include 'pdo.php';

function schemata()
{
	$connection=PDOConnection();
	$result=$connection->query('SELECT * FROM information_schema.SCHEMATA;');
	return $result;
}
?>