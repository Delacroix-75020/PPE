<?php


?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Votre Panier</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><?php
                          foreach ($selproduit as $produit) {
                        
                        $id_produit = $produit['id_produit'];
                        $nom_produit = $produit['nom_produit'];
                        $description = $produit['description'];
                        $prix = $produit['prix'];
                        $qteProduit = $produit['qteProduit'];
                       // $id_categorie = $produit['id_categorie'];
                        $nom_image = $produit['nom_image']; } ?>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td><?= $nom_produit;?></td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="1" /></td>
                            <td class="text-right"><?= $prix;?></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?= $prix;?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light" href="boutique">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Valider votre Panier</button>
                </div>
            </div>
        </div>
    </div>
</div>
