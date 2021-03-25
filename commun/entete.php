<?php 
	$titre="";
	if(isset($info) && $info!="")
		$titre = $info;
	else
		$titre = "Moteur de recherche par mots cl&eacute;s";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?php echo $titre; ?></title>
<meta name="description" content="Extraction des r&eacute;sultats de base de donn&eacute;es par moteur de recherche PHP" />
<meta name="robots" content="index,follow" />
<meta http-equiv="content-language" content="fr" />
<link href='styles/mef.css' rel='stylesheet' type='text/css' />
<script language='javascript' id='cible' src='js/villes_dep.js'></script>
</head>
<body>

	<div class="div_conteneur_parent">
	
		<div class="div_conteneur_page">
			 
			<div align="center"class="titre_page"><h1><?php echo $titre; ?></h1></div>
				<div class="div_int_page">			