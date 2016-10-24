<?php
include 'pdo.php';

function delLine($table, $lineToDel, $idLine)
{
	try{
		$connection = PDOconnection();
		$result = $connection->prepare('DELETE FROM '.$table.' WHERE '.$idLine.'='.$lineToDel);
		$result->execute();
		return ($result);
	}
	catch(PDOException $exception){
		return $exception;
	}
}
?>