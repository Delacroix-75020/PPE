<?php

$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');

function getlesproduits(PDO $bdd){

	$req = "SELECT produit.nom_produit as nom_produit, produit.description as description, produit.prix as prix, image.nom_image as nom_image FROM produit, image WHERE produit.id_image = image.id_image";

	$res = $bdd -> query($req);

	$selproduit = $res->fetchAll();

		return $selproduit;
}

?>