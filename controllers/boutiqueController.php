<?php

	require "models/selectproduitModels.php";
	$selproduit = getlesproduits($bdd);
	require "fonction/fonction-panier.php";
    require "views/boutiqueView.php";
?>
