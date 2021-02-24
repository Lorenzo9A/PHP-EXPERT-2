<?php
$database_lokatie     = 'localhost';
$database_naam        = 'snellejelle';
$database_gebruiker   = 'root';
$database_wachtwoord  = '';

$db_conn = new PDO("mysql:host=$database_lokatie;dbname=$database_naam", $database_gebruiker, $database_wachtwoord);

$sql = "SELECT * FROM klanten";
$statement = $db_conn->prepare($sql); 
$statement->execute();
$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
$sql = "SELECT *, reparatie.id AS reparatie_id, klanten.id AS klanten_id, fiets.id AS fiets_id FROM reparatie 
JOIN klanten ON reparatie.klant_id = klanten.id 
JOIN fiets ON reparatie.fiets_id = fiets.id";
$statement = $db_conn->prepare($sql);
$statement->execute();
$reparatiesVanKlant_M = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<?php
$sql = "SELECT * FROM klanten 
                JOIN fiets ON fiets.klant_id = klanten.id";
 $statement = $db_conn->prepare($sql);
 $statement->execute();
 $fietsenVanKlant = $statement->fetchAll(PDO::FETCH_ASSOC);

 ?>
 