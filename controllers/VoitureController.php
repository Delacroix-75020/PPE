<?php
    













require "models/VoitureModels.php";

$selvoitures = getlesvoitures($bdd);
    require "views/boutique/voitureView.php";




?>