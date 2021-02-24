<?php
    
    require 'db.conn/db.conn.php';



    $sql = "SELECT * FROM fiets WHERE id =:id";
    $statement = $db_conn->prepare($sql); 
    $statement->bindParam(":id", $_GET['id']);
    $statement->execute();
    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);


?>
 
<html>
<body>

<h2>Update: <?php echo  $database_gegevens['klant_id']?></h2>

<form action="db.conn/db.connUpdateF.php" method="get">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <input  type="text"placeholder='Voornaam' name="merk" value="<?php echo $database_gegevens['merk']?>"><br>
        <br>
        <input type="text"placeholder='Email' name="model"value="<?php echo $database_gegevens['model']?>"><br>
        <br>
        <input type="text"placeholder='Achternaam' name="type"value="<?php echo $database_gegevens['type']?>"><br>
        <br>
        <input type="text"placeholder='Achternaam' name="kleur"value="<?php echo $database_gegevens['kleur']?>"><br>
        <br>
        <input type="text"placeholder='Achternaam' name="soortRem"value="<?php echo $database_gegevens['soortRem']?>"><br>
        <br>
        <input type="submit" value='Update'>
</form>

</body>
</html>