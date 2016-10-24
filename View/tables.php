<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>MY PhpMyAdmin</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap-3.3.5/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/myStyle.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/font-awesome-4.5.0/css/font-awesome.min.css"/>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<img class="imgsize" src="images/pma-logo.png" alt="logo.png"/>
				</div>
				<div class="collapse navbar-collapse" id="navContent">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Affichage/Gestion BDD</a></li>
						<li><a href="tables.php">Affichage/Gestion Tables</a></li>
						<li><a href="content.php">Affichage/Gestion Content</a></li>
						<li><a href="freeReq.php">Requête libre</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="col-lg-12" id="titleLDb">
		<h3>Gestion des Tables</h3>
		<div id="listTables">
			<?php
			include '../Controller/controller.php';
			echo showStats();
			?>
		</div>
	</div>
	<div class="col-lg-12 textCenter" id="divSelectDb">
		<h3>Indiquez la base de données à utiliser</h3>
		<div class="col-lg-3"></div>
		<div class="col-lg-6 textCenter">
			<input type="text" class="form-control" id="choiceDb" placeholder="Base de Données"/>
			<br><br>
			<p id="msg"></p>
			<button type="button" class="btn btn-default" id="btnChoiceDb">Valider</button>
		</div>
		<div class="col-lg-3"></div>
	</div>
	<div class="col-lg-12 textCenter" id="divAddTable" style="display: none">
		<h3>Ajouter une Table</h3>
		<input type="text" class="form-control" id="addTable" placeholder="Nom de la nouvelle Table"/><br>
		<table class="table table-striped">
			<thead><tr><th>Nom*</th><th>Type*</th><th>Taille/Valeurs*</th><th>Index</th><th>Auto Increment</th></tr></thead>
			<body>
				<tr>
					<th>
						<input type="text" class="form-control" id="nom" placeholder="Nom">
					</th>
					<td>
						<select class="btn-info" id="type">
							<option>INT</option>
							<option>VARCHAR</option>
							<option>TEXT</option>
							<option>DATE</option>
						</select>
					</td>
					<td>
						<input type="text" class="form-control" id="taille" placeholder="Taille/Valeurs">
					</td>
					<td>
						<select class="btn-info" id="index">
							<option>----</option>
							<option>PRIMARY</option>
							<option>UNIQUE</option>
							<option>INDEX</option>
							<option>FULLTEXT</option>
							<option>SPACIAL</option>
						</select>
					</td>
					<td>
						<input type="checkbox" id="aI"> Oui
					</td>
				</tr>
			</body>
		</table>
		<button type="button" class="btn btn-default" id="btnAddTable">Créer</button>
		<p id="msgAddTable"></p>
	</div>
	<div class="col-lg-12 textCenter" id="divElements" style="display: none">
		<h3>Ajouter un élément dans une table</h3>
		<input type="text" class="form-control" id="tableAddTarget" placeholder="Nom de la Table"/><br>
		<table class="table table-striped">
			<thead><tr><th>Nom*</th><th>Type*</th><th>Taille/Valeurs*</th><th>Index</th><th>Auto Increment</th></tr></thead>
			<body>
				<tr>
					<th>
						<input type="text" class="form-control" id="nomAdd" placeholder="Nom">
					</td>
					<td>
						<select class="btn-info" id="typeAdd">
							<option>INT</option>
							<option>VARCHAR</option>
							<option>TEXT</option>
							<option>DATE</option>
						</select>
					</td>
					<td>
						<input type="text" class="form-control" id="tailleAdd" placeholder="Taille/Valeurs">
					</td>
					<td>
						<select class="btn-info" id="indexAdd">
							<option>----</option>
							<option>PRIMARY</option>
							<option>UNIQUE</option>
							<option>INDEX</option>
							<option>FULLTEXT</option>
							<option>SPACIAL</option>
						</select>
					</td>
					<td>
						<input type="checkbox" id="aIAdd"> Oui
					</td>
				</tr>
			</body>
		</table>
		<button type="button" class="btn btn-default" id="btnAddElement">Créer</button>
		<p id="msgAddElement"></p>
	</div>
	<div class="col-lg-12 textCenter" id="delElement" style="display: none">
		<h3>Supprimer un élément dans une table</h3>
		<input type="text" class="form-control" id="tableDelTarget" placeholder="Nom de la Table"/><br>
		<button type="button" class="btn btn-default" id="btnShowElement">Afficher</button>
		<p id='msgDelElement'></p>
		<div id="structure"></div>
	</div>
	<div class="col-lg-12 textCenter" id="editElement" style="display: none">
		<h3>Editer un élément d'une table</h3>
		<input type="text" class="form-control" id="tableEdit" placeholder="Nom de la Table"/><br>
		<button type="button" class="btn btn-default" id="btnEdit">Afficher</button>
		<p id='msgEditElement'></p>
		<div id="structureEdit"></div>
	</div>
	<div class="col-lg-12 textCenter" id="tableRename" style="display: none">
		<h3>Changer le Nom d'une Table</h3>
		<input type="text" class="form-control" id="tableName" placeholder="Saisissez le nom de votre Table"/>
		<input type="text" class="form-control" id="newTableName" placeholder="Saisissez le nouveau nom de votre Table"/>
		</br>
		<p id="msgEditTableName"></p>
		</br>
		<button type="button" class="btn btn-default" id="btnEditTable">Valider</button>
	</div>
	<footer>
		<script src="javascript/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="css/bootstrap-3.3.5/dist/js/bootstrap.js" type="text/javascript"></script>
		<script src="javascript/tableJs.js" type="text/javascript"></script>
	</footer>
</body>
</html>