<?php

include 'pdo.php';

function reqStats(){
  $connection=PDOConnection();
  $stats=$connection->query('SELECT table_schema as DB, COUNT(*) as nb_tables, create_time as date_creation, sum(data_length + index_length) as memory FROM information_schema.tables GROUP BY table_schema');
  return $stats;
}
?>