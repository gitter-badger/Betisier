	<?php if (empty($_GET["pernum"])) { ?>

	<h1>Liste des personnes enregistrées</h1>

	<?php

	$listePersonnes = $managerPersonne->getListPersonne();
	$nbrPers = $managerPersonne->getNbrPers();

	echo "Actuellement ".$nbrPers[0][0]." personnes sont enregistrées";
	?>
	<form>
		<table class="remonter">
			<th>Numéro</th><th>Nom</th><th>Prenom</th>


			<?php foreach ($listePersonnes as $personne) { ?>
				<tr><td><b><a  href='index.php?page=2&amp;pernum=<?php echo $personne->getNumPersonne();?>'><?php echo$personne->getNumPersonne()?></a></b></td><td><?php echo$personne->getNomPersonne()?></td><td><?php echo$personne->getPrenomPersonne()?></td></tr></br>
			<?php } ?>
		</table>
	</form>
	<p class="remonter">Cliquez sur le numéro de la personne pour obtenir plus d'informations.</p>

<?php } else {

		if ($managerPersonne->estEtudiant($_GET['pernum'])) {

			$etud = $managerEtudiant->getDetailEtud($_GET['pernum']); ?>

			<h1>Détail sur l'étudiant <?php echo $etud[0][5]; ?></h1>
			<table>
				<th>Prénom</th><th>Mail</th><th>Tel</th><th>Departement</th><th>Ville</th>
			<?php foreach ($etud as $personne) { ?>
				<tr><td><?php echo $personne[0]?></td><td><?php echo $personne[1]?></td><td><?php echo $personne[2]?></td><td><?php echo $personne[3]?></td><td><?php echo $personne[4]?></td></tr></br>
			<?php } ?>
		</table>

		<?php } else {

			$sala = $managerSalarie->getDetaiSal($_GET['pernum']); ?>

			<h1>Détail sur le salarié <?php echo $sala[0][5]; ?></h1>
			<table>
				<th>Prénom</th><th>Mail</th><th>Tel</th><th>Tel pro</th><th>Fonction</th>
			<?php foreach ($sala as $personne) { ?>
				<tr><td><?php echo $personne[0]?></td><td><?php echo $personne[1]?></td><td><?php echo $personne[2]?></td><td><?php echo $personne[3]?></td><td><?php echo $personne[4]?></td></tr></br>
			<?php } ?>
				</table>
		<?php }
 }?>
