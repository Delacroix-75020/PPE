
<?php

$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');

function getlespaniers(PDO $bdd){

	$req = "SELECT panier.id_panier as id_panier,panier.nom as nom, panier.prix as prix, panier.qte as qte, panier.id_categorie as id_categorie, panier.id_image as id_image FROM panier, image WHERE panier.id_image = image.id_image AND panier.id_categorie=categorie.id_categorie AND panier.nom=produit.nom_produit AND panier.qte=produit.qteProduit AND panier.prix=produit.prix";

	$res = $bdd -> query($req);

	$selpanier = $res->fetchAll();

		return $selpanier;

}


?>