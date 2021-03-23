<?php
	// Initialiser la session
	session_start();
	// Détruire la session.
	session_destroy(); 
    header("location: connexion");
    
echo 'Vous avez été parfaitement deconnecté <a href="connexion">Cliquez ici</a> pour vous connecter.';
		// Redirection vers la page de connexion
		//header("Location: connexion.php");
?>