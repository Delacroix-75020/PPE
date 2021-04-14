<?php

function commandes($commandes) {
	global $bdd;
	$SQL_commandes = "SELECT * from commande,panier,produit WHERE panier.id_produit=produit.id_produit AND commande.ref_com=panier.ref_com AND commande.total= :total";
	$requete_commandes = $bdd->prepare($SQL_commandes);
    $requete_commandes->bindParam(':total', $commandes, PDO::PARAM_STR);
    $requete_commandes->execute();
    return $requete_commandes->fetchAll(PDO::FETCH_OBJ);
}





/*** MODIFICATION DU username ***/
function checkusername($username) {
	global $bdd;
	$SQL_username = "SELECT * FROM users WHERE username = :username";
    $requete_username_exist = $bdd->prepare($SQL_username);
    $requete_username_exist->bindParam(':username', $username, PDO::PARAM_STR);
    $requete_username_exist->execute();
    return $requete_username_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateusername($username) {
	global $bdd;
	$UPDATE_username = "UPDATE users SET username = :username WHERE id = '".$_SESSION['id']."' ";
	$requete_update_username = $bdd->prepare($UPDATE_username);
	$requete_update_username->bindValue(':username', $username, PDO::PARAM_STR);
	return $requete_update_username->execute();
}

/*** MODIFICATION DE L'ADRESSE EMAIL ***/
function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT * FROM users WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateEmail($email) {
	global $bdd;
	$UPDATE_email = "UPDATE users SET email = :email WHERE id = '".$_SESSION['id']."' ";
	$requete_update_email = $bdd->prepare($UPDATE_email);
	$requete_update_email->bindValue(':email', $email, PDO::PARAM_STR);
	return $requete_update_email->execute();
}


function checkAdresse($adresse) {
	global $bdd;
	$SQL_adresse = "SELECT * FROM users WHERE adresse = :adresse";
    $requete_adresse_exist = $bdd->prepare($SQL_adresse);
    $requete_adresse_exist->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $requete_adresse_exist->execute();
    return $requete_adresse_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateAdresse($adresse) {
	global $bdd;
	$UPDATE_adresse = "UPDATE users SET adresse = :adresse WHERE id = '".$_SESSION['id']."' ";
	$requete_update_adresse = $bdd->prepare($UPDATE_adresse);
	$requete_update_adresse->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	return $requete_update_adresse->execute();
}

/*** MODIFICATION DU username ***/
function checkTel($tel) {
	global $bdd;
	$SQL_tel = "SELECT * FROM users WHERE tel = :tel";
    $requete_tel_exist = $bdd->prepare($SQL_tel);
    $requete_tel_exist->bindParam(':tel', $tel, PDO::PARAM_STR);
    $requete_tel_exist->execute();
    return $requete_tel_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateTel($tel) {
	global $bdd;
	$UPDATE_tel = "UPDATE users SET tel = :tel WHERE id = '".$_SESSION['id']."' ";
	$requete_update_tel = $bdd->prepare($UPDATE_tel);
	$requete_update_tel->bindValue(':tel', $tel, PDO::PARAM_STR);
	return $requete_update_tel->execute();
}

/*** MODIFICATION DU MOT DE passE ***/
function updatepass($pass1) {
	global $bdd;
	$UPDATE_pass = "UPDATE users SET pass = :pass WHERE id = '".$_SESSION['id']."' ";
	$requete_update_pass = $bdd->prepare($UPDATE_pass);
	$requete_update_pass->bindValue(':pass', $pass1, PDO::PARAM_STR);
	return $requete_update_pass->execute();
}

/*** SUPPRESSION DU COMTPE ***/
function deleteCompte($email) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM users WHERE id = '".$_SESSION['id']."' ");
	$delete->bindValue(':email', $email, PDO::PARAM_STR);
	return $delete->execute();
}

?>