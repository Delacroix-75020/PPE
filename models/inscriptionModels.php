<?php

 function getUtilisateur($username, $email, $pass, $adresse, $tel) {
  global $bdd;
  $requete = $bdd->prepare("INSERT INTO users (username, email, tel, adresse, pass) VALUES (:username, :email, :tel, :adresse, :pass");
   $requete->bindValue(':username', $username, PDO::PARAM_STR); 
  $requete->bindValue(':email', $email, PDO::PARAM_STR);
  $requete->bindValue(':tel', $tel, PDO::PARAM_STR);
  $requete->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $requete->bindValue(':pass', $pass, PDO::PARAM_STR);
  $requete->execute();
  return $requete->fetch();
}

 ?>