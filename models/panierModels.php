<?php 

function getlepanier(PDO $bdd){

    $req = $bdd->prepare('INSERT INTO panier (nom, qte, prix, id_image) VALUES(?, ?, ?, ?)');
    $req->execute(array('nom' ,'qte','prix','id_image'));
    
	//$res = $bdd -> query($req);

	$lespaniers = $req->fetchAll();

		return $lespaniers;
}



?>