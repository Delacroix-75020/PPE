<?php
//insertion dans Commande

$insertCommande = $bdd->query("INSERT INTO commande VALUES('',curdate(),".$_SESSION['id'].", ".$_SESSION['total'].")");

$refCommande = $bdd->lastInsertId();
// INSERTION DANS Panier
foreach($_SESSION['shopping_cart'] as $item){
	$insertPanier = $bdd->query("INSERT INTO panier VALUES(".$item['item_id'].",".$refCommande.",".$item['item_quantity'].")");
}

$_SESSION['shopping_cart'] = array();

?>