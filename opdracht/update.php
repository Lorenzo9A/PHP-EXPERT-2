<?php
    
    require 'db.conn/db.conn.php';



    $sql = "SELECT * FROM klanten WHERE id =:id";
    $statement = $db_conn->prepare($sql); 
    $statement->bindParam(":id", $_GET['id']);
    $statement->execute();
    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);



?>
 
<html>
<body>

<h2>Update Lid <?php echo  $database_gegevens['Vname']?></h2>

<form action="db.conn/db.connUpdate.php" method="get">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <input  type="text"placeholder='Voornaam' name="Vname" value="<?php echo $database_gegevens['Vname']?>"><br>
        <br>
        <input type="text"placeholder='Achternaam' name="achternaam"value="<?php echo $database_gegevens['achternaam']?>"><br>
        <br>
        <input type="text"placeholder='Email' name="email"value="<?php echo $database_gegevens['email']?>"><br>
        <br>
        <input type="submit" value='Update'>
</form>

</body>
</html>