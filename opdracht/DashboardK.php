<!DOCTYPE html>
<html>
    <head>
        <meta>
        <meta>
        <title>Document</title>
    </head>
   <body>
     <a href="logout.php">Logout</a>
   </body>
 </html>

<?php
session_start();
$email_klant = $_SESSION['email'];
 
require('db.conn/db.connDashboard.php');
$sql = "SELECT * FROM klanten 
                JOIN fiets ON fiets.klant_id = klanten.id 
              
                WHERE email = :email";
 $statement = $db_conn->prepare($sql);
 $statement->bindParam(":email", $email_klant);
 $statement->execute();
 $fietsenVanKlant = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT *, reparatie.id AS reparatie_id, klanten.id AS klanten_id, fiets.id AS fiets_id FROM reparatie 
                JOIN klanten ON reparatie.klant_id = klanten.id 
                JOIN fiets ON reparatie.fiets_id = fiets.id
                where klanten.email = :email";
$statement = $db_conn->prepare($sql);
$statement->bindParam(":email", $email_klant);
$statement->execute();
$reparatiesVanKlant = $statement->fetchAll(PDO::FETCH_ASSOC);



?>

<style>
 table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

 }

 td, th {
  border: 2px solid black;
  text-align: left;
  padding: 8px;
 }

 tr:nth-child(even) {
  background-color: #dddddd;
 }
</style>

<table>
    <tr>
    <h2>Overzicht fietsen:</h2>
      <th>id</th>
      <th>Naam Klant</th>
      <th>Merk Fiets</th>
      <th>model</th>
      <th>type</th>
      <th>kleur</th>
      <th>Soort Rem</th>
    </tr>
 <tbody>
    <?php foreach($fietsenVanKlant as $data):?>
     <tr>

      <td><?php echo $data["id"]?></td>
      <td><?php echo $data["Vname"]?></td>
      <td><?php echo $data["merk"]?></td>
      <td><?php echo $data["model"]?></td>
      <td><?php echo $data["type"]?></td>
      <td><?php echo $data["kleur"]?></td>
      <td><?php echo $data["soortRem"]?></td>
    </tr>
  </tbody>
  </tr>
  <?php endforeach; ?>
  <br>
 </table>
 <table>
    <tr>
     <br>
     <h2>Overzicht reparatie:</h2>
      <th>id</th>
      <th>Naam Klant</th>
      <th>Merk Fiets</th>
      <th>titel</th>
      <th>datum</th>
      <th>tijdstip</th>
      <th>opmerkingen</th>
      <th>kosten</th>
    </tr>
 <tbody>
    <?php foreach($reparatiesVanKlant as $data):?>
     <tr>

      <td><?php echo $data["id"]?></td>
      <td><?php echo $data["Vname"]?></td>
      <td><?php echo $data["merk"]?></td>
      <td><?php echo $data["titel"]?></td>
      <td><?php echo $data["datum"]?></td>
      <td><?php echo $data["tijdstip"]?></td>
      <td><?php echo $data["opmerkingen"]?></td>
      <td><?php echo $data["kosten"]?></td>

    </tr>
  </tbody>
  </tr>
  <?php endforeach; ?>
 </table>
 </body>
</html>