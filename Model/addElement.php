<?php
include 'pdo.php';

function addElement($tableAddTarget, $nomAdd, $typeAdd, $tailleAdd, $indexAdd, $aIAdd)
{
	
	$connection = PDOConnection();
	if($indexAdd == "----")
		$indexAdd = "";
	if($aIAdd == "true")
	{
		$result = $connection->query('ALTER TABLE '.$tableAddTarget.' ADD '.$nomAdd.' '.$typeAdd.'('.$tailleAdd.') NOT NULL AUTO_INCREMENT , ADD PRIMARY KEY ('.$nomAdd.');');
	}
	else if($aIAdd == "false" && $indexAdd == "PRIMARY")
	{
		$result = $connection->query('ALTER TABLE '.$tableAddTarget.' ADD '.$nomAdd.' '.$typeAdd.'('.$tailleAdd.') NOT NULL , ADD PRIMARY KEY ('.$nomAdd.');');
	}
	else
	{
		$result = $connection->query('ALTER TABLE '.$tableAddTarget.' ADD '.$nomAdd.' '.$typeAdd.'('.$tailleAdd.') NOT NULL;');
	}
	return $result;

}
?>