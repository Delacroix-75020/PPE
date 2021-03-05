<?php

function insertProduit($nom_produit, $prix, $id_categorie, $id_image) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO produit (nom_produit, prix, id_categorie, id_image) 
		VALUES (:nom_produit, :prix, :id_categorie, :id_image)
	");
	$insertion->bindValue(':nom_produit', $nom_produit, PDO::PARAM_STR);
	$insertion->bindValue(':prix', $prix, PDO::PARAM_STR);
	$insertion->bindValue(':id_categorie', $id_categorie, PDO::PARAM_STR);
	$insertion->bindValue(':id_image', $id_image, PDO::PARAM_STR);
	return $insertion->execute();
}

?>