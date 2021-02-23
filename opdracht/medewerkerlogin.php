<!DOCTYPE html>
<html>
<head>
    <meta>
    <meta>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body class="text-center">
    <link rel="stylesheet" href="login.css">
    <main class="form-signin">
      <form method="post" action="">
        <h1 class="h3 mb-3 fw-normal">Medewerker sign in</h1>
        <label for="form_email" class="visually-hidden">Email address</label>
        <input type="email" id="form_email" class="form-control" name="form_email" placeholder="Email address" required autofocus>
        <label for="form_password" class="visually-hidden">Password</label>
        <input type="password" id="form_password" class="form-control" name='form_password' placeholder="password" required>
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="form_login">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
        <a href="login.php">Klanten Login</a>
        <?php
        
             echo date("l jS \of F Y h:i:s A");

        ?>
      </form>
    </main>
         
</body>
</html>
<?php
require "database.php";

if(isset($_POST['form_login'])) {


   $email   = $_POST['form_email'];
   $password   = $_POST['form_password'];


   $sql = "SELECT * from medewerker WHERE email = :ph_email";
   $statement = $db_conn->prepare($sql);
   $statement->bindParam(":ph_email", $email); 
   $statement->execute();
   $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);


   if ($database_gegevens != false){
       if ($database_gegevens['password'] == $password) {
           echo "de gebruiker mag inloggen";
           
       
       session_start();


       $_SESSION['name'] = $database_gegevens['name'];
       $_SESSION['email'] = $database_gegevens['email'];
       $_SESSION['password'] = $database_gegevens['password'];

       header('location: dashboardM.php');
       }
       if ($database_gegevens['password'] == $password) {
           echo "de gebruiker mag inloggen";
       }
   echo $database_gegevens['email'];
}
}
?>