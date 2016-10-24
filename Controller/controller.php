<?php
session_start();

function showStats()
{
	include '../Model/functions.php';
	$stats=reqStats();
	$tab="<table class='table table-striped'>";
	$tab.="<thead class='textCenter'><tr><th>Base de Données</th><th>Nombre de Tables</th><th>Date de Création</th><th>Espace Mémoire (Octets)</th></tr></thead>";
	$tab.="<tbody>";
	while($line=$stats->fetch()){
		$tab.="<tr><td>$line[DB]</td><td>$line[nb_tables]</td><td>$line[date_creation]</td><td>$line[memory]</td></tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function showTables()
{
	include '../Model/reqTables.php';
	$listTables = reqTables($_SESSION['choiceDb']);
	$tab="<table class='table table-striped'>";
	$tab.="<thead><tr><th>Tables</th><thNombre de Lignes</th></tr></thead>";
	$tab.="<tbody>";
	while($line=$listTables->fetch())
	{
		$tab.="<tr><td>$line[TABLE_NAME]</td><td>$line[TABLE_ROWS]</td></tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function showLines($table)
{
	include '../Model/reqLines.php';
	$listLines=reqLines($table);
	$elements = reqElements2($table);
	$test=NULL;
	$tabHead = array();
	$tab="<table class='table table-striped' id='tableLines'>";
	$tab.="<thead><tr>";
	$y=0;
	while($head=$elements->fetch())
	{
		$tab.="<th>$head[Field]</th>";
		if($head[Key]=="PRI")
			$test=true;
		$tabHead[$y]=$head[Field];
		$y++;
	}
	$y=0;
	$tab.="<th>Editer</th>";
	$_SESSION['tabHead']=$tabHead;
	if($test==true)
		$tab.="<th>Supprimer</th>";
	$tab.="</thead>";
	$tab.="<tbody>";
	while($line=$listLines->fetch())
	{
		$i=0;
		$tab.="<tr>";
		while($i<count($line)/2)
		{
			$tab.="<td contenteditable='true'>$line[$i]</td>";
			$i++;
		}
		$tab.="<td><button type='button' class='btn btn-default' name='btnLineEdit'>Editer</button></td>";
		if($test==true)
			$tab.="<td><button type='button' class='btn btn-default' name='btnLineDelete'>Supprimer</button></td>";
		$tab.="</tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function showElements($table)
{
	include '../Model/reqElements.php';
	$listElements=reqElements($table);
	$tab="<table class='table table-striped'>";
	$tab.="<thead><tr><th>Nom Attribut</th><th>Type</th><th>NULL</th><th>Key</th><th>Valeur par défaut</th><th>Extra</th></tr></thead>";
	$tab.="<tbody>";
	while($line=$listElements->fetch())
	{
		$tab.="<tr><td>$line[Field]</td><td>$line[Type]</td><td>$line[Null]</td><td>$line[Key]</td><td>$line[Default]</td><td>$line[Extra]</td></tr>";
	}
	$tab.="</tbody></table>";
	$tab.="<input type='text' class='form-control' id='delElement' placeholder='Elément à supprimer'><br>";
	$tab.="<button type='button' class='btn btn-default' id='btnDelElement'>Supprimer</button>";
	return $tab;
}

function tableEdit($table)
{
	include '../Model/reqElements.php';
	$listElements=reqElements($table);
	$i = 0;
	$tabName = array();
	$tab="<table class='table table-striped'>";
	$tab.="<thead><tr><th>Numéro</th><th>Nom Attribut</th><th>Type</th><th>NULL</th><th>Key</th><th>Editer</th></tr></thead>";
	$tab.="<tbody>";
	if($listElements)
	{
		while($line=$listElements->fetch())
		{
			$tab.="<tr><td>".$i."</td><td contenteditable='true'>$line[Field]</td><td contenteditable='true'>$line[Type]</td><td contenteditable='true'>$line[Null]</td><td>$line[Key]</td><td><button type='button' class='btn btn-default' name='btnTableEdit'>Editer</button></td></tr>";
			$tabName[$i]=$line[Field];
			$i++;
		}
	}
	$tab.="</tbody></table>";
	$_SESSION['tabName']=$tabName;
	return $tab;
}

function showDb()
{
	include '../Model/functions.php';
	$stats=reqStats();
	$tab="<table class='table table-striped'>";
	$tab.="<thead class='textCenter'><tr><th>Base de Données</th><th>Nombre de Tables</th></tr></thead>";
	$tab.="<tbody>";
	while($line=$stats->fetch()){
		$tab.="<tr><td>$line[DB]</td><td>$line[nb_tables]</td></tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function showDbFreq()
{
	include '../Model/schemata.php';
	$stats=schemata();
	$tab="<table class='table table-striped'>";
	$tab.="<thead class='textCenter'><tr><th>Bases de Données</th></tr></thead>";
	$tab.="<tbody>";
	while($line=$stats->fetch()){
		$tab.="<tr><td>$line[SCHEMA_NAME]</td></tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function createDisplay($result, $res1)
{
	$y=0;
	$tab="<table class='table table-striped'>";
	$tab.="<thead class='textCenter'><tr>";
	while($result->getColumnMeta($y)!=false)
	{
		$name=$result->getColumnMeta($y);
		$tab.="<th>$name[name]</th>";
		$y++;
	}
	$tab.="</tr></thead><tbody>";
	$tab.="<tr>";
	$y=0;
	while($y<count($res1)/2)
	{
		$tab.="<td>$res1[$y]</td>";
		$y++;
	}
	$tab.="</tr>";
	while($line=$result->fetch())
	{
		$i=0;
		$tab.="<tr>";
		while($i<count($line)/2)
		{
			$tab.="<td>$line[$i]</td>";
			$i++;
		}
		$tab.="</tr>";
	}
	$tab.="</tbody></table>";
	return $tab;
}

function createAddLine()
{
	$i=0;
	$tab="<table class='table table-striped' id='tableAddLine'>";
	$tab.="<thead class='textCenter'><tr>";
	while($i<count($_SESSION['tabHead']))
	{
		$value=$_SESSION['tabHead'][$i];
		$tab.="<th>$value</th>";
		$i++;
	}
	$i=0;
	$tab.="</theas><tbody><tr>";
	while($i<count($_SESSION['tabHead']))
	{
		$tab.="<td contenteditable='true'></td>";
		$i++;
	}
	$tab.="<td><button type='button' class='btn btn-default' id='btnAddLine'>Ajouter</button></td>";
	$tab.="</tr></tbody></table>";
	return $tab;
}

if(isset($_POST['showDb']))
{
	$stats = showStats();
	echo $stats;
}

if(isset($_POST['newDb']))
{
	include '../Model/addDb.php';

	$result = createDb($_POST['newDb']);
	if ($result)
		echo "Base de Données ajoutée!";
	else
		echo "Erreur lors de l'ajout de la Base de Données!";
}

if(isset($_POST['delDb']))
{
	include '../Model/delDb.php';
	$result = deleteDb($_POST['delDb']);
	if ($result)
		echo "Base de Données supprimée!";
	else
		echo "Erreur lors de la suppression de la Base de Données!";
}

if(isset($_POST['nameDb']) && isset($_POST['newName']))
{
	include '../Model/editNameDb.php';
	$result = editNameDb($_POST['nameDb'], $_POST['newName']);
	echo $result;
}

if(isset($_POST['choiceDb']))
{
	$_SESSION['choiceDb'] = $_POST['choiceDb'];
	$choiceDb = $_SESSION['choiceDb'];
	if($choiceDb != $_POST['choiceDb'])
		echo "Fail Variable de Session";
}

if(isset($_POST['showTables']))
{
	$tables = showTables();
	echo $tables;
}

if(isset($_POST['delTable']))
{
	include '../Model/deleteTable.php';
	$tableToDelete = $_SESSION['choiceDb'];
	$tableToDelete .= ".";
	$tableToDelete .= $_POST['delTable'];
	$result = deleteTable($tableToDelete);

	if($result)
		echo "La table a été supprimée!";
	else
		echo "Erreur lors de la suppression de la Table";
}

if(isset($_POST['tableName']) && isset($_POST['newTableName']))
{
	include '../Model/editTableName.php';
	$tableName = $_SESSION['choiceDb'];
	$tableName .= ".";
	$tableName .= $_POST['tableName'];
	$newTableName = $_SESSION['choiceDb'];
	$newTableName .= ".";
	$newTableName .= $_POST['newTableName'];
	$result = editTableName($tableName, $newTableName);
	$message=$result->errorInfo();
	if($message[2])
		echo $message[2];
	else
		echo "Modification effectuée!";
}

if(isset($_POST['nomTable']) && isset($_POST['nom']) && isset($_POST['type']) &&
	isset($_POST['taille']) && isset($_POST['index']) && isset($_POST['aI']))
{
	include '../Model/addTable.php';
	$nom = $_SESSION['choiceDb'];
	$nom .= ".";
	$nom .= $_POST['nomTable'];
	$result = addTable($nom, $_POST['nom'], $_POST['type'], $_POST['taille'], $_POST['index'], $_POST['aI']);
	if($result)
		echo "Ajout de la nouvelle table effectué!";
	else
		echo "Echec lors de l'ajout de la Table!";
}

if(isset($_POST['tableAddTarget']) && isset($_POST['nomAdd']) && isset($_POST['typeAdd']) &&
	isset($_POST['tailleAdd']) && isset($_POST['indexAdd']) && isset($_POST['aIAdd']))
{
	include '../Model/addElement.php';
	$nom = $_SESSION['choiceDb'];
	$nom .= ".";
	$nom .= $_POST['tableAddTarget'];
	$result = addElement($nom, $_POST['nomAdd'], $_POST['typeAdd'], $_POST['tailleAdd'], $_POST['indexAdd'], $_POST['aIAdd']);
	if($result)
		echo "Ajout d'un nouvel élément à la table effectué!";
	else if(!$result && $_POST['indexAdd'] == "PRIMARY" && $_POST['aIAdd'] == "false")
		echo "Une clé primaire est déjà définie pour cette table, l'ajout n'a pas été effectué.";
	else if(!$result && $_POST['aIAdd'] == "true")
		echo "Auto-Increment sélectionné -> Tentative d'ajout de clé primaire a échoué.";
	else
		echo "Erreur lors de l'ajout d'un élément dans la table.";
}

if(isset($_POST['tableDelTarget']))
{
	$table = $_SESSION['choiceDb'];
	$table .= ".";
	$table .= $_POST['tableDelTarget'];
	$_SESSION['choiceTable'] = $table;
	$result = showElements($table);
	echo $result;
}

if(isset($_POST['delElement']))
{
	include '../Model/delElement.php';
	$result = delElement($_SESSION['choiceTable'], $_POST['delElement']);
	if($result)
		echo "Suppression effectuée";
	else
		echo "Erreur lors de la suppression";
}

if(isset($_POST['showElements']))
{
	$res = showElements($_SESSION['choiceTable']);
	echo $res;
}

if(isset($_POST['tableEdit']))
{
	$table = $_SESSION['choiceDb'];
	$table .= ".";
	$table .= $_POST['tableEdit'];
	$_SESSION['choiceTable'] = $table;
	$result = tableEdit($table);
	echo $result;
}

if(isset($_POST['nameEdit']) && isset($_POST['typeEdit']) && isset($_POST['nullEdit']) && isset($_POST['numeroEdit']))
{
	include '../Model/editElement.php';
	$element=$_SESSION['tabName'][$_POST['numeroEdit']];
	$result= editElement($_SESSION['choiceTable'], $element, $_POST['nameEdit'], $_POST['typeEdit'], $_POST['nullEdit']);
	if($result)
		echo "Modification réussie!";
	else
		echo "Echec de la modification!";
}

if(isset($_POST['actuTableEdit']))
{
	$result = tableEdit($_SESSION['choiceTable']);
	echo $result;
}

if(isset($_POST['showTableContent']))
{
	$table = $_SESSION['choiceDb'];
	$table .= ".";
	$table .= $_POST['showTableContent'];
	$result = showLines($table);
	$_SESSION['tableSelected']=$table;
	echo $result;
}

if(isset($_POST['freeReq']))
{
	include '../Model/query.php';
	$result=freq($_POST['freeReq']);
	$message=$result->errorInfo();
	if($message[2])
		echo $message[2];
	else
	{
		if($res1=$result->fetch())
		{
			$tab=createDisplay($result, $res1);
			echo $tab;
		}
		else
			echo "Votre requête a bien été effectuée!";
	}
}

if(isset($_POST['lineToDel']) && isset($_POST['idLine']))
{
	include '../Model/delLine.php';
	$result=delLine($_SESSION['tableSelected'], $_POST['lineToDel'], $_POST['idLine']);
	$message=$result->errorInfo();
	if($message[2])
		echo $message[2];
	else
		echo "Suppression effectuée!";
}

if(isset($_POST['actuTableLines']))
{
	$result = showLines($_SESSION['tableSelected']);
	echo $result;
}

if(isset($_POST['showTableAddLine']))
{
	$result=createAddLine();
	echo $result;
}

if(isset($_POST['toServer']))
{
	include '../Model/addLine.php';
	$result=addLine($_POST['toServer'], $_SESSION['tableSelected']);
	$message=$result->errorInfo();
	if($message[2])
		echo $message[2];
	else
		echo "Ajout effectué!";
}
?>