<?php
include 'pdo.php';

function reqTables($choiceDb)
{
	$connection = PDOConnection();
	$result = $connection->query('SELECT TABLE_ROWS, TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "'.$choiceDb.'" ORDER BY TABLE_NAME;');
	return ($result);
}
?>