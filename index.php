<?php
session_start()
?>

<!DOCTYPE HTML>
<html lang="fr">
    
    <html>
        <head>
            <meta charset="utf-8">
            <!-- importer le fichier de style -->
            <link rel="stylesheet" href="style.css" type="text/css" >
        </head>
        
        <header>
</header>
 
<body>
        <div id="container">
               <?php
 
 if(isset($_SESSION['id'])){
     
 ?>
            <h2>Vous etes connecter.</h2>
                <button class="droite"><a href="deconnexion.php">Se déconnecter</a></button>
             </div> 
                 <button><a href="profil.php" class="button">Editer Profil</a>

                <?php
             }else{ 
                ?>

            <button class="droite"><a href="inscription.php" class="button">S'inscrire</a></button>
            <button class="droite"><a href="connexion.php" class="button">Se connecter</a></button>

                <?php
                 }
                ?>

        </div>
    </body>
</html>