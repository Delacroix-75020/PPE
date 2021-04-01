


    <div class="row">

    <?php


$connect = new PDO("mysql:host=localhost;dbname=ppe","root","");
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    
    if(!in_array($_POST["id_produit"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_POST["id_produit"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_POST["id_produit"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}
$selvoitures = getlesvoitures($bdd);
                    foreach ($selvoitures as $produit) {
                        
                        $id_produit = $produit['id_produit'];
                        $nom_produit = $produit['nom_produit'];
                        $description = $produit['description'];
                        $prix = $produit['prix'];
                          $qteProduit = $produit['qteProduit'];
                       // $id_categorie = $produit['id_categorie'];
                        $nom_image = $produit['nom_image'];
                    

                    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <br />
      <br />
      <br />
      <h1 align="center" class="jumbotron-heading" >Boutique </a></h1><br />
      <br /><br />
      <?php
        $query =  "SELECT * FROM produit  LEFT JOIN image ON produit.id_image = image.id_image where id_categorie=1 ORDER BY id_produit ASC";
        $result = $connect -> query( $query);
        if($result->rowCount() > 0)
        {
          while($row = $result->fetch())
          {
        ?>
      <div class="col-md-4">
        <form method="post" action="panier?action=add">
          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
            <img src="img/<?php echo $row["nom_image"]; ?>" class="img-responsive" /><br />

            <h4 class="text-info"><?php echo $row["nom_produit"]; ?></h4>

            <h4 class="text-danger">$ <?php echo $row["prix"]; ?></h4>

            <h5 class="text-info"><?php echo $row["description"]; ?></h5>

            <input type="text" name="quantity" value="1" class="form-control" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["nom_produit"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />

             <input type="hidden" name="id_produit" value="<?php echo $row["id_produit"]; ?>" />

            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

          </div>
        </form>
      </div>
      <?php
          }
        }}
      ?></div>
    </div>
  </div>
  <br />
  </body>
  </html>        
    <!-- /.row -->
