<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php

$database_lokatie     = 'localhost';
$database_naam        = 'snellejelle';
$database_gebruiker   = 'root';
$database_wachtwoord  = '';

$db_conn = new PDO("mysql:host=$database_lokatie;dbname=$database_naam", $database_gebruiker, $database_wachtwoord);
$id = $_GET['id'];

$sql = "DELETE FROM fiets where id= $id ";
$statement = $db_conn->prepare($sql); 
$statement->execute();
$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);



?>

<h1>Gebruiker succesvol verwijdert</h1>
<a href="..\dashboardM.php" class="btn btn-light">Terug naar overzicht</a>