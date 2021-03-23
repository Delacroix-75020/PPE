<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/layout.css" />
</head>
<body>
<?php
	// Initialiser la session
	session_start();
	// Détruire la session.
	session_destroy();
echo 'Vous avez été parfaitement deconnecté <a href="connexion.php">Cliquez ici</a> pour vous connecter.';
		// Redirection vers la page de connexion
		//header("Location: connexion.php");
?>
</body>
</html>