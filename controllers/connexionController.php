<?php

  require "models/connexionModels.php";
 
if (isset($_POST['formconnexion'])) {
   
    if (!empty($_POST['email'])) {
      
        if (!empty($_POST['pass'])) {
       
            $email = $_POST['email'];
            $pass = sha1($_POST['pass']);
            $requete = getUtilisateur($email, $pass);
            if ($requete) { 
            	
                    $_SESSION['id'] = $requete['id'];
                    $_SESSION['username'] = $requete['username'];
                    $_SESSION['email'] = $requete['email'];
                    $_SESSION['pass'] = $requete['pass'];
                    header('Location: home');
                
            } else {
                Alerts::setFlash("Identifiants incorrects.", "danger");
            }
        } else {
            Alerts::setFlash("Veuillez saisir votre mot de passe", "warning");
        }
    } else {
        Alerts::setFlash("Veuillez saisir votre pseudo", "warning");
    }
}


  require "views/connexionView.php";
?>