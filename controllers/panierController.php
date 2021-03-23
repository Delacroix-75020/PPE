<?php
require "models/selectproduitModels.php";
require "models/panierModels.php";
	
	$lespaniers = getlepanier($bdd);

    require "views/panierView.php";
?>