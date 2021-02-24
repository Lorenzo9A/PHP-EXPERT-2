<?php

 require('db.conn/db.connDashboardM.php');

?>


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
 <!DOCTYPE html>
<html>
 <head>
    <meta>
    <meta>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
 </head>
  <link rel="stylesheet" href="style.css">
 <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboardM.php">Overzicht medewerkers <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
 </nav>
 <h2>Overzicht Klanten:</h2>

 <table>
    <tr>
      <th>id</th>
      <th>voornaam</th>
      <th>achternaam</th>
      <th>email</th>
      <th>update</th>
      <th>verwijder</th>
    </tr>
 <tbody>
    <?php foreach($database_gegevens as $data):?>
     <tr>
      <td><?php echo $data["id"]?></td>
      <td><?php echo $data["Vname"]?></td>
      <td><?php echo $data["achternaam"]?></td>
      <td><?php echo $data["email"]?></td>
      <td><a href="update.php?id=<?php echo $data['id']; ?>"  class="btn btn-light">Update</a></td></td>
      <td><a href="db.conn/db.connDelete.php?id=<?php echo $data['id']; ?>"  class="btn btn-danger">Verwijder</a></td></td>

    </tr>
  </tbody>
  </tr>
  <?php endforeach; ?>
 </table>
 <h2>Overzicht reparaties:</h2>

<table>
   <tr>
     <th>id</th>
     <th>Naam klant</th>
     <th>Merk fiets</th>
     <th>titel</th>
     <th>datum</th>
     <th>tijdstip</th>
     <th>opmerkingen</th>
     <th>kosten</th>
     <th>update</th>
     <th>verwijder</th>
   </tr>
<tbody>
   <?php foreach($reparatiesVanKlant_M  as $data):?> 
    <tr>

     <td><?php echo $data["id"]?></td>
     <td><?php echo $data["Vname"]?></td>
     <td><?php echo $data["merk"]?></td>
     <td><?php echo $data["titel"]?></td>
     <td><?php echo $data["datum"]?></td>
     <td><?php echo $data["tijdstip"]?></td>
     <td><?php echo $data["opmerkingen"]?></td>
     <td><?php echo $data["kosten"]?></td>
     <td><a href="updateR.php?id=<?php echo $data['id']; ?>"  class="btn btn-light">Update</a></td></td>
     <td><a href="db.conn/db.connDeleteR.php?id=<?php echo $data['id']; ?>"  class="btn btn-danger">Verwijder</a></td></td>
     </tr>
  </tbody>
  </tr>
  <?php endforeach; ?>
 </table>
 <h2>Overzicht fietsen:</h2>

<table>
   <tr>
     <th>id</th>
     <th>Naam Klant</th>
     <th>Merk fiets</th>
     <th>model</th>
     <th>type</th>
     <th>kleur</th>
     <th>soortRem</th>
     <th>update</th>
     <th>verwijder</th>
   </tr>
<tbody>
   <?php foreach($fietsenVanKlant  as $data):?> 
    <tr>

     <td><?php echo $data["id"]?></td>
     <td><?php echo $data["Vname"]?></td>
     <td><?php echo $data["merk"]?></td>
     <td><?php echo $data["model"]?></td>
     <td><?php echo $data["type"]?></td>
     <td><?php echo $data["kleur"]?></td>
     <td><?php echo $data["soortRem"]?></td>
     <td><a href="updateF.php?id=<?php echo $data['id']; ?>"  class="btn btn-light">Update</a></td></td>
     <td><a href="db.conn/db.connDeleteF.php?id=<?php echo $data['id']; ?>"  class="btn btn-danger">Verwijder</a></td></td>
     </tr>
  </tbody>
  </tr>
  <?php endforeach; ?>
 </table>
 </body>
</html>