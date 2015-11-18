
<?php
if(empty($_SESSION['co'])){

  if(empty($_POST['login'])&&empty($_POST['pwd'])&&empty($_POST['captchaRep'])){

  $nb1=rand(1,9);
  $nb2=rand(1,9);
  $_SESSION['captcha']=$nb1+$nb2;
  ?>


      <h1>Pour vous connecter</h1>
      <form action="#" method="post">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Entrez un login" required="required"/>
      </br>
        <label for="pwd">Mot de passe</label>
        <input type="password" id="pwd" name="pwd" placeholder="Mot de passe" required="required"/>
      </br>
        <label for="captchaRep"><img src="image/nb/<?php echo $nb1; ?>.jpg" alt="nb1" /> <b> + </b> <img src="image/nb/<?php echo $nb2; ?>.jpg" alt="nb2"/> <b> = </b></label>
        <input type="text" pattern="\d*" id="captchaRep" name="captchaRep" placeholder="Captcha" required="required"/>
      </br>
        <button type="submit">Se connecter</button>
      </form>

  <?php
  }
  if(!empty($_POST['login'])&&!empty($_POST['pwd'])&&!empty($_POST['captchaRep'])){

    if($_POST['captchaRep'] == $_SESSION['captcha']){
      $personne = $managerPersonne->getPersonnesByLogin($_POST['login']);
      if(empty($personne[0]->getNumPersonne())){?>
            Personne non enregistrée, redirection...
        <script type="text/javascript">
          window.setTimeout("location=('index.php?page=13');",2000);
        </script><?php
      } else {
        $salt = "48@!alsd";
        $pass_crypt = $_POST['pwd'];
        //$pass_crypt = md5(md5($pass).$salt);
        if($pass_crypt === $personne[0]->getPwdPersonne()){
          $_SESSION['co'] = $personne[0]->getNumPersonne();
          if($managerPersonne->estEtudiant($personne[0]->getNumPersonne())){
            $_SESSION['etu'] = true;
          } else {
            $_SESSION['sal'] = true;
          }
          if($personne[0]->getAdminPersonne() == 1){
            $_SESSION['admin']='1';
          }
        }
        if(empty($_SESSION['co'])){?>
              Mauvais mot de passe, redirection...
          <script type="text/javascript">
            window.setTimeout("location=('index.php?page=13');",2000);
          </script>
          <?php
        } else { ?>
              Connexion réussie, redirection...
          <script type="text/javascript">
            window.setTimeout("location=('index.php?page=0');",2000);
          </script>
          <?php
        }
      }
    } else {
      ?>
          Captcha incorrect, redirection...
      <script type="text/javascript">
        window.setTimeout("location=('index.php?page=13');",2000);
      </script>
      <?php
    }
  }
} else {?>
  <script type="text/javascript">
    window.setTimeout("location=('index.php?page=0');",0);
  </script><?php
}
?>
