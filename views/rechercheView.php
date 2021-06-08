<?php auth(1); ?>


<form method="post" action="" class="d-flex">
                <input type="search" name="nom_produit" placeholder="Rechercher un produit" class="form-control me-2">
                <button type="submit" name="subsearch" class="btn btn-outline-success">Search</button>
</form>

<?php

if (isset($_POST['subsearch'])) {
    $search = htmlentities($_POST['nom_produit']);
    $prix = isset($_POST['prix']) ? (int)$_POST['prix'] : 0;
    $sql = "SELECT * FROM produit WHERE ";

    if (strlen($search) > 0)
        $sql .= "nom_produit LIKE '%$search%' OR prix = $prix";

    //$sql = substr($sql, 0, strlen($sql)-4);
    
    $requete = $bdd->query($sql);
   

    $produits = $requete->fetchAll();

    foreach ($produits as $produit) {
        echo "<p>".$produit['nom_produit']."</p>";
        echo "<p>".$produit['prix']."</p>";
    }
}

?>