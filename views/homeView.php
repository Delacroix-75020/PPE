<section class="py-5 text-center container bg">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">La Societe Filelec</h1>
        <p class="lead text-muted">Bienvenue sur la boutique de la société Filelec spécialisée dans la ventes de piéces automobiles. vous pouvez retrouvez ci dessous et dans notre catalogues des piéces de rechanges de voitures, de camion, de bus ou encore des accessoires automobiles .</p>
      </div>
    </div>
  </section>

<section class="py-5 text-center container bg">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Qui Sommes Nous ?</h1>
        <p class="lead text-muted">Née de l’union entre plusieurs passionnés de développement Web à l’Ecole IRIS, la start-up KorpWeb est présente sur le marché du développement informatique depuis 2020. 
La société intervient dans les domaines de la conception de site internet a destination des petites entreprises comme là notre afin de les aider à accroitre leur notoriété. Par la suite cette notoriété impactera la nôtre grâce aux recommandations de nos clients.
Notre entreprise s’engage a respecter ses dires et a fournir un travail exemplaire et sans bavure a ses clients sinon on s’engage a rembourser intégralement le budget mis par le client
Nous restons disponibles pour vous rencontrer et étudier les possibilités de partenariat éventuelles au vu de la forte synergie entre nos activités respectives. Vous pouvez nous contacter à l’adresse suivante :<strong> filelec.ppe2020@gmail.com</strong>.
Nous espérons avoir des nouvelles de vous pour de nouveaux partenariats.</p> 
      </div>
    </div>
  </section>




<?php 
include("commun/connexion.php");
  include("commun/entete.php");
  
  include("fonction/traitement_chaine.php");
  
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
        
        $requete_et .= "LIMIT 0,10;";
        
        $compteur=0;
        $retours = $conn->query($requete_et);
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
          $retours = $conn->query( $requete_ou);

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







