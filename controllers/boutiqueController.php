<?php

	require "models/selectproduitModels.php";
	$selproduit = getlesproduits($bdd);
	
    require "views/boutiqueView.php";
?>
