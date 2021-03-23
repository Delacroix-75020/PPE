


    <div class="row">

    <?php

                    foreach ($selvoitures as $produit) {
                        
                        $id_produit = $produit['id_produit'];
                        $nom_produit = $produit['nom_produit'];
                        $description = $produit['description'];
                        $prix = $produit['prix'];
                          $qteProduit = $produit['qteProduit'];
                       // $id_categorie = $produit['id_categorie'];
                        $nom_image = $produit['nom_image'];
                    

                    ?>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100" id="<?= $id_produit ?>">
          <a href=""><img class="card-img-top" src="img/<?= $nom_image ?>"alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href=""><?= $nom_produit ?></a>
            </h4>
            <h5><?= $prix ?>€</h5>
            <p class="card-text"><?= $description ?></p>
          </div>
          <div class="card-footer">
             <a href="panier?action=ajout&l=<?= $id_produit; ?>&q=1&p=<?= $prix; ?>" onclick="shop()" class="addpanier">Ajouter au panier</a>
          </div>
        </div>
      </div>

<script>
function shop() {
 header('Location: panier');
}
</script>
<?php } ?> 
    </div>
    <!-- /.row -->
