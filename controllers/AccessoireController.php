<?php
    













require "models/AccessoireModels.php";

$selAccessoires = getlesAccessoires($bdd);
    require "views/boutique/AccessoireView.php";




?>