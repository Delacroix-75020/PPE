<?php auth(1); ?>
<?php

if(isset($_GET["id"])){
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    { 
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        header("Location: ../panier");
      }
    }
 }
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
                    <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
                <tbody>
                        <tr>
                         
                            <td><?php echo $values["item_name"]; ?></td>
                            <td>In stock</td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td> $ <?php echo $values["item_price"]; ?></td>
                              <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>

                           <td><a class="btn btn-danger" href="panier/<?php echo $values["item_id"]; ?>"><span class="text">Supprimer</span></a></td>

                        </tr>
                        <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            $_SESSION['total'] =  $total;
          ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>$ <?php echo number_format($total, 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a class="btn btn-block btn-light" href="boutique">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-lg btn-block btn-success text-uppercase" href="Validation">Valider votre Panier</a>
                </div></div></div></div></div>
        <?php
          }
          ?>

