<?php
session_start();
if(!empty($_POST)){  
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $requete = "SELECT * FROM utilisateurs WHERE Login = '$username' AND password = '$password' ";
    $db = mysqli_connect("localhost", "root", "", "moduleconnexion");
    $query = mysqli_query($db,$requete);
    $users = mysqli_fetch_assoc($query);
    

    if(isset($users)){
        $_SESSION['id'] = $users['id'];
        header('location: index.php');

    
    }
    if($username == 'admin' || $username == 'admin' && $password == 'admin'){
        header('location: admin.php');
    }
    else{ echo 'Identifiant ou mot de pass incorrect';}
}
?>

<!DOCTYPE HTML>
<html lang="fr">

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" type="text/css" >
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="connexion.php" method="POST">

                  <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                
            </form>
        </div>
    </body>
</html>