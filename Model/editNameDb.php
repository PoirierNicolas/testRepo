<?php

include 'pdo.php';

function editNameDb($nameDb, $newName)
{
	$i = 0;
	$test = 0;
	while($i<strlen($newName))
	{
		if($newName[$i] == " ")
		{
			$test = 1;
			$i = strlen($newName);
		}
		else
			$i++;
	}
	if($test == 0)
	{
		$connection = PDOConnection();
		$result = $connection->query('CREATE DATABASE '.$newName.';');
		if($result)
		{
			$req = $connection->query('SELECT CONCAT("RENAME TABLE ", GROUP_CONCAT( table_schema,".",table_name, " TO ","'.$newName.'.",table_name," "),";") as transfert FROM information_schema.TABLES WHERE table_schema LIKE "'.$nameDb.'" GROUP BY table_schema');
			while ($line=$req->fetch()){
				$swap = $connection->query($line['transfert']);
			}
			if($swap)
				$del = $connection->query('DROP DATABASE '.$nameDb.'');
			else
				return ("Erreur lors du transfert des tables de la Base de Données!");

			if($del)
				return ("Modification terminée!");
			else
				return ("Erreur lors de la suppression de la Base de Données!");
		}
		
		else
			return ("Erreur lors de la création de la Base de Données!");
	}
	else
		return ("Nom de la nouvelle Base de Donées incorrect");
}
?>