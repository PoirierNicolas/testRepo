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
		<h3>Liste des Bases de Données</h3>
		<div id='listDb'>
			<?php
			include '../Controller/controller.php';
			echo showStats();
			?>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="col-lg-6 textCenter">
			<h3>Ajout Base de Données</h3>
			<input type="text" class="form-control" id="addDb" placeholder="Saisissez le nom de la Base de Données">
			<button type="button" class="btn btn-default" id="btnAddDb">Créer</button>
			<p id="test"></p>
		</div>
		<div class="col-lg-6 textCenter">
			<h3>Suppression Base de Données</h3>
			<input type="text" class="form-control" id="delDb" placeholder="Saisissez le nom de la Base de Données">
			<button type="button" class="btn btn-default" id="btnDelDb">Supprimer</button>
			<p id="msgDelDb"></p>
		</div>
	</div>
	<div class="col-lg-12 textCenter">
		<h3>Editer Nom Base de Données</h3>
		<input type="text" class="form-control" id="nameDb" placeholder="Saisissez le nom de la Base de Données"/>
		<input type="text" class="form-control" id="newName" placeholder="Saisissez le nouveau nom de la Base de Données"/>
		</br>
		<p id="msgName"></p>
		</br>
		<button type="button" class="btn btn-default" id="btnEdit">Valider</button>
	</div>
	<footer>
		<script src="javascript/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="css/bootstrap-3.3.5/dist/js/bootstrap.js" type="text/javascript"></script>
		<script src="javascript/myJs.js" type="text/javascript"></script>
	</footer>
</body>
</html>