
	<h1>Liste des citations déposées</h1>

	<?php

	$listeCita = $managerCitation->getListCitation();
	$nbrCita = $managerCitation->getNbrCitation();

	echo "Actuellement ".$nbrCita[0][0]." citations sont enregistrées";
	?>
	<table>
		<th>Nom de l'enseignant</th><th>Libellé</th><th>Date</th><th>Moyenne des notes</th>
		<?php
	foreach ($listeCita as $tabCita) {
		echo "<tr><td>".$tabCita[0]." ".$tabCita[1]."</td><td>".$tabCita[2]."</td><td>".$tabCita[3]."</td><td>".round($tabCita[4],2)."</td></tr></br>";
	}
	?>
	</table>
