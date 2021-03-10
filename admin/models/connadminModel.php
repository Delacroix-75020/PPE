<?php

 
function getAdmin($email, $pass) {
	global $bdd;
	$requete = $bdd->prepare("SELECT * FROM admin WHERE email = :email AND pass= :pass");
	$requete->bindValue(':email', $email, PDO::PARAM_STR);
	$requete->bindValue(':pass', $pass, PDO::PARAM_STR);
	$requete->execute();
	return $requete->fetch();
}

?>