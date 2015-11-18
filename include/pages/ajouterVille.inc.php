<h1>Ajouter une ville</h1>

<?php if (empty($_POST["nom"])){ ?>
<form action="#" method="post">
  <strong> Nom : </strong>
  <input type="text" name="nom">
  <input type="submit" value="Valider">

<?php } else {
  if ($managerVille->villeExiste($_POST["nom"])){ ?>
    La ville existe déjà
  <?php } else {
    $managerVille->ajouterVille($_POST["nom"])
    ?>
    La ville "<strong><?php echo $_POST["nom"] ?></strong>" a été ajoutée
  <?php }
} ?>
