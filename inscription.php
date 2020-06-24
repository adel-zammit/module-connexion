<!DOCTYPE html>
<html lang="fr">

<?php

//SI ON CLIC SUR BOUTON SUBMIT{
    if(isset($_POST['bouton'])){

        //DEFINITION DES VARIABLES PAR INPUT
        $login=$_POST['login'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_password'];
        
        //SI MES VARIABLES SONT BIEN RENTREES{
            if($login && $prenom && $nom && $password && $conf_password)
                {
                //SI LE MOT DE PASSE = MA CONFIRMATION DE MOT DE PASSE{
                    if($password == $conf_password){
                        //CONNEXION BDD 
                        $db = mysqli_connect("localhost", "root", "", "moduleconnexion");
                        //CREATION REQUETE
                        $requete="INSERT INTO utilisateurs (Login,Prenom,Nom,Password) VALUES ('$login','$prenom','$nom','$password')";
                        //EXECUTION REQUETE
                        $resultat=mysqli_query($db,$requete);
                        //REDIRECTION PAGE
                        header('Location: connexion.php');
                        // }SINON
                    }else{ 
                        echo 'Mot de passe et confirmation de Mot de Pass ne correspondent pas.';}
                    
                    //}SINON
                }else{
                    echo 'Veuillez remplire correctement tout les champs.';}
                //}
            }
        
    ?>

<link rel="stylesheet" href="style.css" type="text/css" >

    <form method="POST" action="inscription.php">
 
 <p>
 <header>
            

                    <h1>Inscription</h1>
    </header>
</div>


        <fieldset>
            <legend><strong>A propos</strong></legend>
            
            <label for="fname">Login: (Obligatoire)</label><br>
            <input type="text"  name="login"><br>
            <br><label for="fname">Prenom: (Obligatoire)</label></br>
            <input type="text" name="prenom"><br>

            <br><label for="cmdp">Nom: (Obligatoire)</label></br>
            <input type="text" name="nom"><br>
            <br><label for="mail">Password: (Obligatoire)</label>
            <br><input type="password" name="password"></br>
            <br><label for="num">Confirmation Password:</label>
            <br><input type="password" name="conf_password"></br>
        </fieldset>
     
        <br>
       
        <br><input type="submit" value="Inscription" name="bouton"></br>
        
    </div>
</div>

</form>
  