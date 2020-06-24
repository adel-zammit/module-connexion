<?php 

$db = mysqli_connect("localhost", "root", "", "moduleconnexion");
$requete = "SELECT * FROM utilisateurs";
$query = mysqli_query($db,$requete);
$user = mysqli_fetch_all($query);
 ?>

     <button><a href="connexion.php">Déconnexion</button>
 <div class="button">
     <button>Acceuil</button>
     <button><a href="profil.php" class="button">Editer Profil</a>
</div>

<div id="container">

         <h1>Administrateur</h1>

    <table border ="3" cellpadding="3" cellspacing="3">
    <tr>
        <th>Id</th> 
        <th>Login</th>  
        <th>Prenom</th> 
        <th>Nom</th>
        <th>Password</th>
    </tr>
    
    <?php foreach ($user as $valeur) { ?>
    <tr>
        <td> <?php echo $valeur[0];?> </td>
        <td> <?php echo $valeur[1];?> </td>
        <td> <?php echo $valeur[2];?> </td>
        <td> <?php echo $valeur[3];?> </td>
        <td> <?php echo $valeur[4];?> </td>
    </tr>
</div>

<?php
} 
?>



<!DOCTYPE HTML>
<html>
    <head>
    
        <link rel="stylesheet" href="style.css" type="text/css" >
        <title>Administration</tittle>
    </head>

    <body>
        <div id="container">

 

  

        </div>
    </body>
</html>