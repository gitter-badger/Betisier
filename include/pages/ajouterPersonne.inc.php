<?php
$db = new Mypdo();
$depMan = new DepartementManager($db);
$fonMan = new FonctionManager($db);
?>
<?php if (empty($_POST["login"])){ ?>

<h1>Ajouter une personne</h1>

<form action="#" method="post"> </br>
  <strong> Nom : </strong>
  <input type="text" name="nom"> </br>
	<strong> Prénom : </strong>
	<input type="text" name="prenom"> </br>
	<strong> Téléphone : </strong>
	<input type="text" name="telephone"> </br>
	<strong> Mail : </strong>
	<input type="text" name="mail"> </br>
	<strong> Login : </strong>
	<input type="text" name="login"> </br>
	<strong> Mot de passe : </strong>
	<input type="password" name="mdp"> </br>
	<strong> Catégorie : </strong>
	<input type="radio" name="cat" value="etudiant"> Etudiant
	<input type="radio" name="cat" value="personnel"> Personnel </br>
  <input type="submit" value="Valider">
</form>

<?php } else {
  if ($managerPersonne->loginExiste($_POST["login"])){ ?>
    Ce login existe déjà </br>
		Redirection dans 2 secondes ...
		<script type="text/javascript">
		  window.setTimeout("location=('index.php?page=0');",2000);
		</script>

  <?php } else {

		$salt = "48@!alsd";
		$pass = $_POST['mdp'];
		$pass_crypt = md5(md5($pass).$salt);
    $array = [
      'per_num' => 1,
      'per_nom' => $_POST["nom"],
      'per_prenom' => $_POST["prenom"],
      'per_tel' => $_POST["telephone"],
      'per_mail' => $_POST["mail"],
      'per_admin' => 0,
      'per_login' => $_POST["login"],
      'per_pwd' =>  $pass_crypt
    ];
	$personne = new Personne($array);
    $managerPersonne->ajouterPersonne($personne);
    $_SESSION["nom"]=$_POST["nom"];

			if (!($_POST["cat"]) == "etudiant") { ?>

				<h1>Ajouter un étudiant</h1>

				<form action="#" method="post"> </br>
                <label for="telpro"><strong> Téléphone professionnel : </strong></label>
        	        <input id="telpro" type="text" name="telpro"> </br>
					<label for="fonction">Fonction :</label>
					<SELECT id="fonction" name="fonction" size="1"></br>
						<OPTION>lundi
						<OPTION>mardi
						<OPTION>mercredi
						<OPTION>jeudi
						<OPTION>vendredi
					</SELECT>
				  <input type="submit" value="Valider">
				</form>

	<?php		} else if (($_POST["cat"]) == "etudiant") { ?>

    <h1>Ajouter un étudiant</h1>

    <form action="#" method="post">
      Année :
      <SELECT name="annee" size="1"> </br>
        <?php for($i=0;$i<6;$i++){ ?>
        	<option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
      </SELECT>
      Département :
      <SELECT name="departement" size="1"></br>
        <?php $departements = $depMan->getList(); ?>
            <?php foreach ($departements as $departement){ ?>
                <option value="<?php echo $departement->getNomDep(); ?>"><?php echo $departement->getNomDep(); ?></option>
           <?php } ?>
      </SELECT>
      <input type="submit" value="Valider">
    </form>

	<?php } else if ((empty($_POST["telpro"]) AND !empty($_POST["annee"])) AND !empty($_SESSION["nom"])) { ?>


    Ajout réussi, redirection dans 2 secondes ..
    <script type="text/javascript">
      window.setTimeout("location=('index.php?page=0');",2000);
    </script>

    <?php }	else if ((!empty($_POST["telpro"]) OR empty($_POST["annee"])) AND !empty($_SESSION["nom"])) { ?>

    <?php	} else { ?>


<?php	}
    }
} ?>
