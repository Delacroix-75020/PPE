<div class="box-sizing: border-box;">

<!-- Page Content -->
<div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">La Boutique</h1>
    <div class="list-group">
      <a href="#" class="list-group-item">Voiture</a>
      <a href="#" class="list-group-item">Bus</a>
      <a href="#" class="list-group-item">Accessoire automobile</a>
      <a href="#" class="list-group-item">Camion</a>
    </div>

  </div>
  <!-- /.col-lg-3 -->
  <?php

                    foreach ($selproduit as $produit) {
                        
                        //$id_produit = $produit['id_produit'];
                        $nom_produit = $produit['nom_produit'];
                        $description = $produit['description'];
                        $prix = $produit['prix'];
                        //$id_categorie = $produit['id_categorie'];
                        $nom_image = $produit['nom_image'];
                    

                    ?>

  <div class="col-lg-9">



    <div class="row">

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100" id="<?= $id_produit ?>">
          <a href="#"><img class="card-img-top" src="img/<?= $nom_image ?>"alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?= $nom_produit ?></a>
            </h4>
            <h5><?= $prix ?>$</h5>
            <p class="card-text"><?= $description ?></p>
          </div>
          <div class="card-footer">
             <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter Au panier</button>
          </div>
        </div>
      </div>
<?php } ?> 

    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

</div>