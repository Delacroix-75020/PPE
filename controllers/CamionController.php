<?php
    













require "models/CamionModels.php";

$selcamions = getlescamions($bdd);
    require "views/boutique/CamionView.php";




?>