<?php

include_once("fonction/fonctions-panier.php");
  
$titre = "boutique";
?>
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




<?php //barre de recherche
include("commun/connexion.php");
  include("commun/entete.php");
  include("fonction/traitement_chaine.php");
  $selproduit = getlesproduits($bdd);
  
  if(isset($_POST["mc"]) && $_POST["mc"]!="")
  {
    $chaque_mot=""; $url_fiche=""; $titre_fiche=""; $chaine_fiche=""; $compteur=0;
    $les_mots_cles = strtolower(utf8_decode($_POST["mc"]));
    $les_mots_cles=supprAccents(supprSpeciaux($les_mots_cles));
    $mots_a_exclure="avec|pour|dans|";
    $tableau_exclure=explode("|",$mots_a_exclure);
    $requete_et="SELECT * FROM produit ";
    $requete_ou = $requete_et;
    
    //echo $les_mots_cles;

    for($i=0;$i<sizeof($tableau_exclure);$i++)
    {
      $les_mots_cles=str_replace($tableau_exclure[$i],"",$les_mots_cles);
    }

    $les_mots_cles=str_replace("   "," ",str_replace("  "," ",$les_mots_cles));
    $les_mots_cles = str_replace("-"," ",$les_mots_cles);
    
    $nouveau=false;
    $fichier_nouveau="recherches/".str_replace(" ","-",$les_mots_cles).".txt";
    if(file_exists($fichier_nouveau))
    {
      $d1 = strtotime(date("j F Y H:i", filemtime($fichier_nouveau)));
      $d2 = strtotime(date("j F Y H:i")); //date en cours
      $difference = (int)$d2 - (int)$d1;
      if($difference > 3600) //1 heure
        $nouveau=true;
    }
    else
      $nouveau=true;
    
    //echo $les_mots_cles;

    if($nouveau==true)
    {
      if(strlen(str_replace(" ","",$les_mots_cles))<1)
        $chaine_fiche="Oups !<br /><br />Le contenu de votre demande est insuffisant pour être traité.";
      else if(strlen(str_replace(" ","",$les_mots_cles))>50)
        $chaine_fiche="Oula !<br /><br />Votre demande semble bien compliquée !<br /> Veuillez la simplifier.";
      else if(strpos($les_mots_cles, "a")===false && strpos($les_mots_cles, "e")===false && strpos($les_mots_cles, "i")===false && strpos($les_mots_cles, "o")===false && strpos($les_mots_cles, "u")===false && strpos($les_mots_cles, "y")===false)
        $chaine_fiche="Désolé !<br /><br />Votre demande ne semble pas correcte !<br /> Il faut être plus clair.";
      else
      {
        $tableau_mots_cles=explode(" ",$les_mots_cles);
        for($i=0;$i<sizeof($tableau_mots_cles);$i++)
        {
          $chaque_mot = rtrim($tableau_mots_cles[$i], "s"); //Supprime le s de fin soit le pluriel
          if(strlen($chaque_mot)>3)
          {
            if($compteur==0)
            {
              $requete_et .= "WHERE p_motscles LIKE '%".$chaque_mot."%' ";
              $requete_ou .= "WHERE p_motscles LIKE '%".$chaque_mot."%' ";
            }
            else
            {
              $requete_et .= "AND p_motscles LIKE '%".$chaque_mot."%' ";  
              $requete_ou .= "OR p_motscles LIKE '%".$chaque_mot."%' ";             
            }
            
            $compteur++;
          }
        }
        
        $requete_et .= "LIMIT 0,100;";
        
        $compteur=0;
        $retours = $bdd->query($requete_et);
        while($retour = $retours->fetch())
        {
          $url_fiche=supprAccents(supprSpeciaux(strtolower($retour["nom_produit"])));
          
          $titre_fiche = stripslashes($retour["nom_produit"]);
          $titre_fiche = supprSpeciaux(strtolower($titre_fiche));
          $titre_fiche = str_replace("-"," ",$titre_fiche);
          for($i=0;$i<sizeof($tableau_mots_cles);$i++)
          {
            $chaque_mot = rtrim($tableau_mots_cles[$i], "s"); //Supprime le s de fin soit le pluriel
            if(strlen($chaque_mot)>2)
            {   
              $titre_fiche=str_replace($chaque_mot,"<span style='background-color:yellow;'>".$chaque_mot."</span>",$titre_fiche);
            }
          }
          
          $chaine_fiche.= "<div style='float:left; width:100%; padding-bottom:5px;'>";
          $chaine_fiche.= "<a href='".$url_fiche."' target='_self' style='color:#666666;'>".ucfirst(utf8_encode($titre_fiche))."</a>";
          $chaine_fiche.= "</div>";   
          
          $compteur++;
        }
        
        if($compteur==0)
        {
          $chaine_fiche = "Aucun résultat strictement équivalent trouvé. Rubriques connexes les plus pertinentes :<br /><br />";
          $retours = $bdd->query( $requete_ou);

          while($retour = $retours->fetch())
          {
            $proportion = 0;
            $url_fiche=supprAccents(supprSpeciaux(strtolower($retour["nom_produit"])));
            
            $titre_fiche = stripslashes($retour["nom_produit"]);
            $titre_fiche = supprSpeciaux(strtolower($titre_fiche));
            $titre_fiche = str_replace("-"," ",$titre_fiche);
            for($i=0;$i<sizeof($tableau_mots_cles);$i++)
            {
              $chaque_mot = rtrim($tableau_mots_cles[$i], "s"); //Supprime le s de fin soit le pluriel
              
              if(strpos(supprAccents(supprSpeciaux(strtolower($retour["p_motscles"]))),$chaque_mot)!==false)
                $proportion++;
              
              if(strlen($chaque_mot)>1)
              {   
                $titre_fiche=str_replace($chaque_mot, "<span style='background-color:yellow;'>".$chaque_mot."</span>",$titre_fiche);
              }
            }
            
            $proportion = round($proportion/sizeof($tableau_mots_cles),1);
            if($proportion>=0.6)
            {         
            
              $chaine_fiche.= "<div style='float:left; width:100%; padding-bottom:5px;'>";
              $chaine_fiche.= "<span style='color:#CC3300'>".$proportion*(100)."%</span> : <a href='".$url_fiche."' target='_self' style='color:#666666;'>".ucfirst(utf8_encode($titre_fiche))."</a>";
              $chaine_fiche.= "</div>";   
              
              $compteur++;
              if($compteur>=10)
                break;          
            }
          }       
        }
      }
      $cache=fopen($fichier_nouveau, "w");
      fwrite($cache, $chaine_fiche);
      fclose($cache);     
    }
    else
    {
      $cache=fopen($fichier_nouveau,"r");
      $chaine_fiche=fread($cache, filesize($fichier_nouveau));
      fclose($cache); 
      $chaine_fiche .= "<div style='float:left; width:100%; padding-top:10px; color:#999999;'><i>Restitution de la base de connaissance</i></div>";     
    }
  }
?>
      <div style="width:100%;display:block;text-align:center;">
      </div>
      
      <div class="div_saut_ligne" style="height:30px;">
      </div>            
      
     
      <div class="div_saut_ligne">
      </div>    
      
      <div style="width:100%;height:auto;text-align:center;">
            
      <div style="width:800px;display:inline-block;" id="conteneur">
      
        <div class="warp">
          <div class="titre_centre">
          <form id="formulaire" name="formulaire" method="post" action="">           
            <div class="liste_div">
              <input type="text" id="mc" name="mc" class="searchTerm" value="Vos mots clés de recherche" onClick="this.value='';" />
            </div>
            <div class="liste_div" style="float:left;">
              <input type="submit" id="valider" name="valider" class="searchButton" style="width:100px;" value="Valider" />
            </div>            
          </form>         
          </div>  
        </div>    
      
        <div class="colonne" id="colonne_gauche">
        Liste des résultats<br /><br />
        <?php 
          if(isset($_POST["mc"]) && $_POST["mc"]!="")
            echo $chaine_fiche;//."<br />".$requete_et;
        ?>
        </div>
        
        <div class="centre">
          <div class="titre_centre">
          Résultats PHP.
          </div>  
        </div>          
        
      </div>
      
      </div>

      <div class="div_saut_ligne" style="height:50px;">
      </div>

<?php//barre de recherche   
?>












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