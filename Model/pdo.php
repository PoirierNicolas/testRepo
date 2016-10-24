<?php
	function PDOConnection(){
  $serverName="localhost";
  $userName="root";
  $password="root";

  try{
    $connection = new PDO("mysql:host=$serverName", $userName, $password);
  }
  catch(PDOException $e){
    echo 'Échec lors de la connexion : ' . $e->getMessage();
  }
  return $connection;
}
?>