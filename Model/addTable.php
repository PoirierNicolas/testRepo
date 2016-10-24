<?php
include 'pdo.php';

function addTable($nomTable, $nom, $type, $taille, $index, $aI)
{
	$connection = PDOConnection();
	if($index == "----")
		$index = "";
	if($aI == "true")
	{
		$result = $connection->query('CREATE TABLE '.$nomTable.' ( '.$nom.' '.$type.'('.$taille.') NOT NULL AUTO_INCREMENT , PRIMARY KEY ('.$nom.')) ENGINE = InnoDB;');
	}
	else if($aI == "false" && $index == "PRIMARY")
	{
		$result = $connection->query('CREATE TABLE '.$nomTable.' ( '.$nom.' '.$type.'('.$taille.') NOT NULL , PRIMARY KEY ('.$nom.')) ENGINE = InnoDB;');
	}
	else
	{
		$result = $connection->query('CREATE TABLE '.$nomTable.' ( '.$nom.' '.$type.'('.$taille.') NOT NULL ) ENGINE = InnoDB;');
	}
	return $result;

}
?>