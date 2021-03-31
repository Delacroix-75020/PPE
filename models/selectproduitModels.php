<?php

$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');

function getlesproduits(PDO $bdd){

	$req = "SELECT produit.id_produit as id_produit,produit.nom_produit as nom_produit, produit.description as description, produit.prix as prix, produit.qteProduit as qteProduit, produit.id_categorie as id_categorie, image.nom_image as nom_image FROM produit, image WHERE produit.id_image = image.id_image";

	$res = $bdd -> query($req);

	$selproduit = $res->fetchAll();

		return $selproduit;

}


?>