<?php

  require "models/inscriptionModels.php";


if(isset($_POST['forminscription'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $pass = sha1($_POST['pass']);
    $pass2 = sha1($_POST['pass2']);
    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['pass']) AND !empty($_POST['pass2'])) {
       $usernamelength = strlen($username);
       if($usernamelength <= 255) {
          if($email == $email2) {
             if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $reqemail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                $reqemail->execute(array($email));
                $emailexist = $reqemail->rowCount();
                if($emailexist == 0) {
                   if($pass == $pass2) {
                      $insertmbr = $bdd->prepare("INSERT INTO users(username, email, pass) VALUES(?, ?, ?)");
                      $insertmbr->execute(array($username, $email, $pass));
                      $erreur = "Votre compte a bien été créé ! <a href=\"connexion\">Me connecter</a>";
                   } else {
                      $erreur = "Vos mots de passes ne correspondent pas !";
                   }
                } else {
                   $erreur = "Adresse email déjà utilisée !";
                }
             } else {
                $erreur = "Votre adresse email n'est pas valide !";
             }
          } else {
             $erreur = "Vos adresses email ne correspondent pas !";
          }
       } else {
          $erreur = "Votre username ne doit pas dépasser 255 caractères !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 }
    require "views/inscriptionView.php";
?>