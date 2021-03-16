<?php
require "models/selectproduitModels.php";
    require "models/panierModels.php";
    require "views/panierView.php";
    $selpanier = getlespaniers($bdd);
	require "fonction/fonction-panier.php";
?>