<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "moduleconnexion");

function renderError($errors)
{
    if (!empty($errors)) {
        $output = "";
        if (count($errors) > 1)
        {
            $output .= "<ul>";
            foreach ($errors as $error)
            {
                $output .= "<li>" . $error . "</li>";
            }
            $output .= "</ul>";
        }
        else
        {
            $output = $errors[0];
        }
        return "<div class=\"blockMessage blockMessage--error block-rowMessage--iconic\">"
            . $output .
            "</div>";
    }
    else
    {
        return "";
    }
}

if(isset($_SESSION['id'])){ 
    $requete = "SELECT * FROM utilisateurs WHERE id =  " . $_SESSION['id'];
    $query = mysqli_query($db,$requete);
    $users = mysqli_fetch_assoc($query);
    
    $error = [];

    if(!empty($_POST)){
        $login = htmlspecialchars($_POST['newlogin']);
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $newnom = htmlspecialchars($_POST['newnom']);
        $confpassword = htmlspecialchars($_POST['confpassword']);
        $newpassword = htmlspecialchars($_POST['newpassword']);
        $confpass = htmlspecialchars($_POST['confpass']);

        if($users['Password'] != $confpassword){
            $error[] = 'Mot de passe incorrect'; 
        }
        $requetetest = "SELECT * FROM utilisateurs WHERE Login = '" . $login . "' AND Login != '" . $users['Login'] . "'";
        $querytest = mysqli_query($db,$requetetest);
        $logintest = mysqli_fetch_assoc($querytest);
        if(!empty($logintest)){
            $error[] = 'Le pseudo doit être unique';
        }
        if(!empty($newpassword) && $newpassword != $confpass){
            $error[] = 'Les mots de passes ne correspondent pas';
        }
        if(empty($login)){
            $error[] = 'Il faut un login'; 
        }
        if(empty($newprenom)){
            $error[] = ' Il faut un prénom';
        }
        if(empty($newnom)){
            $error[] = 'Il faut un nom';
        }
        if(empty($error)){
            $requeteUpdate = "UPDATE utilisateurs SET ";
            $SET = [];
            if(!empty($newpassword)){
                $SET[] = "Password = '" . $newpassword . "'"; 
            }
            if($users['Login'] != $login){
                $SET[] = "Login = '" . $login . "'";
            }
            if($users['Prenom'] != $newprenom){
                $SET[] = "Prenom = '" . $newprenom . "'";
            }
            if($users['Nom'] != $newnom){
                $SET[] = "Nom = '" . $newnom . "'";
            }
            if(!empty($SET)){
                $output = implode(' , ', $SET); 
                $requeteUpdate .= $output . " WHERE id = " . $_SESSION['id'];
                mysqli_query($db,$requeteUpdate);
                header('location: profil.php');
            } 
        }
    }


?>


<html>
    <head>
       <meta charset="utf-8">
      
        <link rel="stylesheet" href="style.css" type="text/css" >
    </head>

 
<body>
    <div class="button">
    <button><a href="index.php">Acceuil</button>
    </div>
        <div id="container">

               
                <form method="POST" action="#">
    
            <h1>Edition de mon profil</h1>
        <?= renderError($error) ?><br>
                <label>Login:</label>
                <input type="text" name="newlogin" placeholder="Login" value="<?php echo $users['Login']; ?>" /><br /><br />
                <label>Prénom:</label>
                <input type="text" name="newprenom" placeholder="Prénom" value="<?php echo $users['Prenom']; ?>"/><br /><br />
                <label>Nom:</label>
                <input type="text" name="newnom" placeholder="Nom" value="<?php echo $users['Nom']; ?>"/><br /><br />
                <label>Ancien Password:</label>
                <input type="password" name="confpassword" placeholder="Ancien password" required >
                <label>Password:</label>
                <input type="password" name="newpassword" placeholder="Password" /><br /><br />
                <label>Confirmation Password:</label>
                <input type="password" name="confpass" placeholder="Comfirmer Password" /><br /><br />
                <input type="submit" value="Confimer les modifications" /><br />
                </form>

        </div>
    </body>
    </html>
    <?php
     }
     else
     { header( "location: connexion.php"); }

     ?>