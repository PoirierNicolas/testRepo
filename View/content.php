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
		<h3>Gestion du contenu des Tables</h3>
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
	<div class="col-lg-12 textCenter" id="divSelectTable" style="display: none">
		<h3>Indiquez la table que vous souhaitez modifier</h3>
		<div class="col-lg-3"></div>
		<div class="col-lg-6 textCenter">
			<input type="text" class="form-control" id="choiceTable" placeholder="Nom Table"/>
			<br><br>
			<p id="msg2"></p>
			<button type="button" class="btn btn-default" id="btnChoiceTable">Afficher</button>
		</div>
		<div class="col-lg-3"></div>
	</div>
	<div class="col-lg-12 textCenter" id="divAddLines" style="display: none">
		<h3>Ajouter une ligne</h3>
		<div class="col-lg-12 textCenter" id="tableAddLine"></div>
		<p id='msgAddLines'></p>	
		<button type="button" class="btn btn-default" id="btnAdd">Ajouter</button>
	</div>
	<div class="col-lg-12 textCenter" id="listLines"></div>
	<footer>
		<script src="javascript/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="css/bootstrap-3.3.5/dist/js/bootstrap.js" type="text/javascript"></script>
		<script src="javascript/contentJs.js" type="text/javascript"></script>
	</footer>
</body>
</html>