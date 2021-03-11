<?php

/** Appel Automatic de toutes les classes **/

require "core/Autoloader.php";

Autoloader::register();

$session = new Session();

require "core/functions.php";

$bdd = connectBDD();

if(isset($_GET['p']))
{   
    if(file_exists("controllers/".$_GET['p']."Controller.php"))//Verifie si la page demandée existe
        $page = $_GET['p'];
    else//redirection vers page 404
        $page = "404";
}
else{
    $page = "home";
}


ob_start();// arrete l'affichage
    require "controllers/".$page."Controller.php";// recuperation de la page
$content = ob_get_clean();

require "template.php";

?>