<?php
$db = new Mypdo();
$depMan = new DepartementManager($db);
$fonMan = new FonctionManager($db);
$etuMan = new EtudiantManager($db);
$divMan = new DivisionManager($db);
$managerPersonne = new PersonneManager($db);
?>
<?php if (empty($_POST["login"])){ ?>

<h1>Ajouter une personne</h1>

    <form action="#" method="post">
        <label for="nom"> Nom : </label>
        <input id="nom" type="text" name="nom"> <br>
        <label for="prenom"> Prénom : </label>
        <input id="prenom" type="text" name="prenom"> <br>
        <label for="telephone"> Téléphone : </label>
        <input id="telephone" type="text" name="telephone"> <br>
        <label for="mail"> Mail : </label>
        <input id="mail" type="text" name="mail"> <br>
        <label for="login"> Login : </label>
        <input id="login" type="text" name="login"> <br>
        <label for="mdp"> Mot de passe : </label>
        <input id="mdp" type="password" name="mdp"> <br>
        <label for="cat"> Catégorie : </label> <br>
        <label for="cat">Etudiant</label>
        <input id="cat" type="radio" name="cat" value="etudiant"> <br>
        <label for="personnel">Personnel</label>
        <input type="radio" id="personnel" name="cat" value="personnel"> <br>
  <input type="submit" value="Valider">
</form>

<?php } else {
  if ($managerPersonne->loginExiste($_POST["login"])){ ?>
      <p>Ce login existe déjà
          Redirection dans 2 secondes ...</p>
		<script type="text/javascript">
		  window.setTimeout("location=('index.php?page=0');",2000);
		</script>

  <?php } else {

		$salt = "48@!alsd";
		$pass = $_POST['mdp'];
		$pass_crypt = md5(md5($pass).$salt);
      $array = ['per_num' => 1,
          'per_nom' => $_POST["nom"],
          'per_prenom' => $_POST["prenom"],
          'per_tel' => $_POST["telephone"],
          'per_mail' => $_POST["mail"],
          'per_admin' => 0,
          'per_login' => $_POST["login"],
          'per_pwd' => $pass_crypt];
      $personne = new Personne($array);
      $managerPersonne->ajouterPersonne($personne);
      $_SESSION["nom"] = $_POST["nom"];

      switch ($_POST['cat']) {
          case "personnel":
              ?>
              <h1>Ajouter un membre du personnel</h1>

              <form action="#" method="post">
                <label for="telpro"><strong> Téléphone professionnel : </strong></label>
                  <input id="telpro" type="text" name="telpro">
					<label for="fonction">Fonction :</label>
                  <select id="fonction" name="fonction" size="1">
                  </select>
				  <input type="submit" value="Valider">
				</form>
              <?php break;
          case "etudiant":
              ?>
              <h1>Ajouter un étudiant</h1>

              <form action="index.php?page=1" method="post">
                  <input type="hidden" name="login" value="<?php $_POST['login'] ?>">
                  <label for="departement">departement</label>
                  <select id="departement" name="departement" size="1">
                      <?php $departements = $depMan->getList(); ?>
                      <?php foreach ($departements as $departement) { ?>
                          <option
                              value="<?php echo $departement->getNumDep(); ?>"><?php echo $departement->getNomDep(); ?></option>
                      <?php } ?>
                  </select>
                  <label for="divisionSelect">Division</label>
                  <select name="division" id="divisionSelect">
                      <?php $divisions = $divMan->getList() ?>
                      <?php foreach ($divisions as $division) { ?>
                          <option
                              value="<?php echo $division->getNumDiv() ?>"><?php echo $division->getNomDiv() ?></option>
                      <?php } ?>
                  </select>
                  <input type="submit" value="Valider">
              </form>
              <?php break;
          default:
              break;
      }
      ?>

  <?php }
    if ((empty($_POST["telpro"]) && !empty($_POST['division']) && !empty($_SESSION["nom"]))) { ?>

        <?php $etudiant = new Etudiant([$Etudiant::$COL_DEP_NUM => $_POST['departement'], Etudiant::$COL_DIV_NUM => $managerPersonne->getIdByLogin($_POST['per_login']), Etudiant::$COL_DIV_NUM => $_POST['division']]);
        $etuMan->ajouterEtudiant($etudiant) ?>
        <p>Ajout réussi, redirection dans 2 secondes ..</p>
        <script type="text/javascript">
            window.setTimeout("location=('index.php?page=0');", 2000);
        </script>

    <?php } else if ((!empty($_POST["telpro"]) OR empty($_POST["division"])) AND !empty($_SESSION["nom"])) { ?>

    <?php } else { ?>


<?php	}
} ?>
