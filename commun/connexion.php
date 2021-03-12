<?php 
/*
	Section de configuration
*/

	$info = $_SERVER['REQUEST_URI'];
	$info = substr($info,strripos($info,"/")+1);
	$info = str_replace(".php","",str_replace("-"," ",$info));
	$info = strtoupper(substr($info,0,1)).substr($info,1);
	
	
$servername = 'localhost';
$dbname='ppe';
            $username = 'root';
            $password = '';
            
            //On essaie de se connecter
            try{
                $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
      
?>