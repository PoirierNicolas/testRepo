<?php
include 'pdo.php';

function editTableName($nameTable, $newNameTable)
{
	try{
		$connection = PDOConnection();
		$result = $connection->prepare('RENAME TABLE '.$nameTable.' TO '.$newNameTable.';');
		$result->execute();
		return $result;
	}
	catch(PDOException $exception){
		return $exception;
	}
		
}
?>