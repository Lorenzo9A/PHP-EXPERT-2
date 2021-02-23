<?php

require 'database.php';

$sql = "SELECT * from klant";
$statement = $db_conn->prepare($sql);
$statement->execute();
$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);

print_r($database_gegevens);
?>