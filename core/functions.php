<?php

function connectBDD(){
    
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=ppe","root","");
        return $bdd;
    }catch(Exception $e){
        die("erreur bdd");
    }
}

function auth($lvl){// fonction qui controle si le lvl de l utilisateur est suffisant
    
    if(isset($_SESSION['lvl']) && $_SESSION['lvl'] >= $lvl)
        return true;
    else
        header("Location:404");
}





