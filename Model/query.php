<?php
include 'pdo.php';

function freq($input){
	try{
		$connection = PDOconnection();
		$result = $connection->prepare($input);
		$result->execute();
		return ($result);
	}
	catch(PDOException $exception){
		return $exception;
	}
}
?>