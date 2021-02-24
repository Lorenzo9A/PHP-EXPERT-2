<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
    

$database_lokatie     = 'localhost';
$database_naam        = 'snellejelle';
$database_gebruiker   = 'root';
$database_wachtwoord  = '';

$db_conn = new PDO("mysql:host=$database_lokatie;dbname=$database_naam", $database_gebruiker, $database_wachtwoord);



$sql = "UPDATE fiets SET merk= :merk,model=:model,kleur=:kleur,soortRem=:soortRem where id=:id";
 $statement = $db_conn->prepare($sql); 
 $statement->bindParam(':merk', $_GET['merk']);
 $statement->bindParam(':model', $_GET['model']);
 $statement->bindParam(':kleur', $_GET['kleur']);
 $statement->bindParam(':soortRem', $_GET['soortRem']);
 $statement->bindParam(':id', $_GET['id']);
 $statement->execute();

?>

<h1>Gebruiker aangepast</h1>
<a href="..\dashboardM.php" class="btn btn-light">Terug naar overzicht</a>