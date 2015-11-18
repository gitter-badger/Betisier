<?php session_start();

$db=new Mypdo();
$managerVille=new VilleManager($db);
$managerCitation=new CitationManager($db);
$managerPersonne=new PersonneManager($db);
$managerEtudiant=new EtudiantManager($db);
$managerSalarie=new SalarieManager($db);

 ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php
		$title = "Bienvenue sur le site du bétisier de l'IUT.";?>
		<title>
		<?php echo $title ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />

</head>
	<body>
	<div id="header">
		<div id="connect">
      <?php if(empty($_SESSION['co'])){?>
              <a href="index.php?page=13" role="button"><b>Connexion</b></a>
      <?php } else {
              $personne = $managerPersonne->getPersonneByNum($_SESSION['co']);?>
              <a href="index.php?page=14" role="button">utilisateur : <?php echo $personne[0]->getPrenomPersonne(); ?> &#8239; &#8239; &#8239; &#8239; Déconnexion</a>
      <?php } ?>
		</div>
		<div id="entete">
			<div id="logo">
        Inclure image
        <!-- <img src="image/lebetisier.gif" alt="Logo du site" /> -->
			</div>
			<div id="titre">
				Le bétisier de l'IUT,<br />Partagez les meilleures perles !!!
			</div>
		</div>
	</div>
