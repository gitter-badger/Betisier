
<h1>Liste des villes</h1>

<?php

$listeVilles = $managerVille->getListVille();
$nbrVille = $managerVille->getNbrVille();

echo "Actuellement ".$nbrVille[0][0]." villes sont enregistrées";
?>
<table class="remonter">
	<th>Numéro</th><th>Nom</th>
	<?php
foreach ($listeVilles as $ville) {
	echo "<tr><td>".$ville->getNumVille()."</td><td>".$ville->getNomVille()."</td></tr></br>";
}
?>
</table>
