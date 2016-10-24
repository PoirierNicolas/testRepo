<?php
include 'pdo.php';

function addLine($toServer, $table)
{
	array_pop($toServer);
	$i=0;
	$req="INSERT INTO $table VALUES (";
		while($i<count($toServer)-1)
		{
			$req.="?, ";
			$i++;
		}
		$i++;
		$req.="?)";
try{
	$connection = PDOconnection();
	$result = $connection->prepare($req);
	$result->execute($toServer);
	return ($result);
}
catch(PDOException $exception){
	return $exception;
}
}
?>