<?php auth(1); ?>
<div class="box-sizing: border-box;">

<!-- Page Content -->
<div class="container">

<div class="row">

  <div class="col-lg-6">

    <h1 class="my-6">La Boutique</h1>
    <div class="list-group">
      <a href="Voiture" class="list-group-item"><img src="img/Voiture.png" >     Voiture</a>
      <a href="Bus" class="list-group-item"><img src="img/Bus.png" >     Bus</a>
      <a href="Accessoire" class="list-group-item"><img src="img/volant.png" >     Accessoire automobile</a>
      <a href="Camion" class="list-group-item"><img src="img/camion.png" >     Camion</a>
    </div>

  </div>

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

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Filelec Boutique</title>
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
        $query =  "SELECT * FROM produit LEFT JOIN image ON produit.id_image = image.id_image ORDER BY id_produit ASC";
        $result = $connect -> query( $query);
        if($result->rowCount() > 0)
        {
          while($row = $result->fetch())
          {
        ?>
      <div class="col-md-4">
        <form method="post" action="panier?action=add">
          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
            <img src="../SharedIMG/<?php echo $row["nom_image"]; ?>" class="img-responsive" /><br />

            <h4 class="text-info"><?php echo $row["nom_produit"]; ?></h4>

            <h4 class="text-danger">$ <?php echo $row["prix"]; ?></h4>

            <h5 class="text-info"><?php echo $row["description"]; ?></h5>

            <input type="number" name="quantity" value="1" class="form-control" min="1" max="5" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["nom_produit"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />

             <input type="hidden" name="id_produit" value="<?php echo $row["id_produit"]; ?>" />

            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

          </div>
        </form>
      </div>
      <?php
          }
        }
      ?></div>
    </div>
  </div>
  <br />
  </body>
</html>
</div>
<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
  $output = array();
  foreach($array as $keys => $values)
  {
    $output[] = $values[$column_name];
  }
  return $output;
}*/
?>

  <!-- /.col-lg-3 -->
  

  

















    <div class="row">

    <?php

                    foreach ($selproduit as $produit) {
                        
                        $id_produit = $produit['id_produit'];
                        $nom_produit = $produit['nom_produit'];
                        $description = $produit['description'];
                        $prix = $produit['prix'];
                          $qteProduit = $produit['qteProduit'];
                       // $id_categorie = $produit['id_categorie'];
                        $nom_image = $produit['nom_image'];
                    

                    ?>

      <!--div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100" id="<?= $id_produit ?>">
          <a href="#"><img class="card-img-top" src="img/<?= $nom_image ?>"alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="Moteur-de-Voiture-Audi-A3"><?= $nom_produit ?></a>
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

 
  <!-- /.col-lg-9 -->

</div>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->

</div>