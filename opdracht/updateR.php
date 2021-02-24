<?php
    
    require 'db.conn/db.conn.php';



    $sql = "SELECT * FROM reparatie WHERE id =:id";
    $statement = $db_conn->prepare($sql); 
    $statement->bindParam(":id", $_GET['id']);
    $statement->execute();
    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);


?>
 
<html>
<body>

<h2>Update: <?php echo  $database_gegevens['klant_id']?></h2>

<form action="db.conn/db.connUpdateR.php" method="get">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <input  type="text"placeholder='titel' name="titel" value="<?php echo $database_gegevens['titel']?>"><br>
        <br>
        <input type="text"placeholder='datum' name="datum"value="<?php echo $database_gegevens['datum']?>"><br>
        <br>
        <input type="text"placeholder='tijdstip' name="tijdstip"value="<?php echo $database_gegevens['tijdstip']?>"><br>
        <br>
        <input type="text"placeholder='opmerkingen' name="opmerkingen"value="<?php echo $database_gegevens['opmerkingen']?>"><br>
        <br>
        <input type="text"placeholder='kosten' name="kosten"value="<?php echo $database_gegevens['kosten']?>"><br>
        <br>
        <input type="submit" value='Update'>
</form>

</body>
</html>