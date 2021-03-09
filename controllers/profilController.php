<?php require "models/profilmodel.php";

if (!isset($_SESSION['id'])) {
	header('Location: connexion');
}

// Modification du username
if (isset($_POST['new-username'])) {
	if (!empty($_POST['username'])) {
		$username = htmlspecialchars($_POST['username']);
        $requete_username_exist = checkusername($username);
        if ($requete_username_exist) {
            Alerts::setFlash("Ce username est déjà utilisé.", "warning");
        } else {
        	$requete_update_username = updateusername($username);
            unset($_SESSION['id']);
			session_destroy();
			header('Location: connexion');
			exit();
	    }
	}
}

// Modification de l'adresse email
if (isset($_POST['new-email'])) {
	if (!empty($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
        $requete_email_exist = checkEmail($email);
        if ($requete_email_exist) {
            Alerts::setFlash("Cette adresse email déjà utilisé.", "warning");
        } else {
        	$requete_update_email = updateEmail($email);
            unset($_SESSION['id']);
			session_destroy();
			header('Location: connexion');
			exit();
	    }
	}
}

// Modification du mot de passe
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);
    if($mdp1 == $mdp2) {
    $insertmdp = $bdd->prepare("UPDATE users SET pass = ? WHERE id = ?");
    $insertmdp->execute(array($mdp1, $_SESSION['id']));
    unset($_SESSION['id']);
    session_destroy();
    header('Location: connexion');
    } else {
    $msg = "Vos deux mdp ne correspondent pas !";
    }
    }

// Suppresion du compte
if (isset($_POST['delete'])) {
	if (!empty($_POST['email'])) {
		if (!empty($_POST['pass'])) {
			$email = htmlspecialchars($_POST['email']);
			$pass = sha1($_POST['pass']);
			$requete_email_exist = checkEmail($email);
            if ($requete_email_exist) {
				$delete = deleteCompte($email);
				unset($_SESSION['id']);
				session_destroy();
				header('Location: connexion');
				exit();
            } else {
            	Alerts::setFlash("Adresse email introuvable.", "warning");
            }
		}
	}
}

require "views/profilview.php";

?>