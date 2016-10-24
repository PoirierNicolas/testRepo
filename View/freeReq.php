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
		<h3>Bases de Données</h3>
		<div id='listDb'>
			<?php
			include '../Controller/controller.php';
			echo showDbFreq();
			?>
		</div>
	</div>
	<div class="col-lg-12 textCenter" id="divFreeReq"></div>
	<div class="col-lg-12 textCenter">
		<h3>Requête libre sur les bases de données</h3>
		<div class="textCenter form-group">
			<textarea rows="5" type="text" class="form-control" id="inputFreeReq" placeholder="Votre requête"></textarea>
			<br><br>
			<p id="msgFree"></p>
			<button type="button" class="btn btn-default" id="btnFreeReq">Valider</button>
		</div>
	</div>
	<footer>
		<script src="javascript/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="css/bootstrap-3.3.5/dist/js/bootstrap.js" type="text/javascript"></script>
		<script src="javascript/freeReq.js" type="text/javascript"></script>
	</footer>
</body>
</html>