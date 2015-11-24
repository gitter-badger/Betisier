<?php
class Personne {

  /**
   * @var int
   */
  private $per_num;
  /**
   * @var string
   */
  private $per_nom;
  /**
   * @var string
   */
  private $per_prenom;
  /**
   * @var string
   */
  private $per_tel;
  /**
   * @var string
   */
  private $per_mail;
  /**
   * @var boolean
   */
  private $per_admin;
  /**
   * @var string
   */
  private $per_login;
  /**
   * @var $string
   */
  private $per_pwd;

  /**
   * Personne constructor.
   * @param array $valeurs
   */
  public function __construct($valeurs = array())
  {
    if (!empty($valeurs)) {
      $this->affecte($valeurs);
    }
  }

  /**
   * @return mixed
   */
  public function getPerNum()
  {
    return $this->per_num;
  }

  /**
   * @param mixed $per_num
   */
  public function setPerNum($per_num)
  {
    $this->per_num = $per_num;
  }

  /**
   * @param $donnees
   */
  public function affecte($donnees)
  {
    foreach ($donnees as $attribut => $valeur) {
      switch ($attribut) {
        case 'per_num':
          $this->setNumPersonne($valeur);
          break;
        case 'per_nom':
          $this->setNomPersonne($valeur);
          break;
        case 'per_prenom':
          $this->setPrenomPersonne($valeur);
          break;
        case 'per_tel':
          $this->setTelPersonne($valeur);
          break;
        case 'per_mail':
          $this->setMailPersonne($valeur);
          break;
        case 'per_admin':
          $this->setAdminPersonne($valeur);
          break;
        case 'per_login':
          $this->setLoginPersonne($valeur);
          break;
        case 'per_pwd':
          $this->setPwdPersonne($valeur);
          break;
        default;
          break;
      }
    }
  }

  /**
   * @param $num
   */
  public function setNumPersonne($num)
  {
    $this->per_num = $num;
  }

  /**
   * @param $nom
   */
  public function setNomPersonne($nom)
  {
    $this->per_nom = $nom;
  }

  /**
   * @param $prenom
   */
  public function setPrenomPersonne($prenom)
  {
    $this->per_prenom = $prenom;
  }

  /**
   * @param $tel
   */
  public function setTelPersonne($tel)
  {
    $this->per_tel = $tel;
  }

  /**
   * @param $mail
   */
  public function setMailPersonne($mail)
  {
    $this->per_mail = $mail;
  }

  /**
   * @param $adm
   */
  public function setAdminPersonne($adm)
  {
    $this->per_admin = $adm;
  }

  /**
   * @param $log
   */
  public function setLoginPersonne($log)
  {
    $this->per_login = $log;
  }

  /**
   * @param $pwd
   */
  public function setPwdPersonne($pwd)
  {
    $this->per_pwd = $pwd;
  }

  /**
   * @return int
   */
  public function getNumPersonne()
  {
    return $this->per_num;
  }

  /**
   * @return string
   */
  public function getNomPersonne()
  {
    return $this->per_nom;
  }

  /**
   * @return string
   */
  public function getPrenomPersonne()
  {
    return $this->per_prenom;
  }

  /**
   * @return string
   */
  public function getTelPersonne()
  {
    return $this->per_tel;
  }

  /**
   * @return string
   */
  public function getMailPersonne()
  {
    return $this->per_mail;
  }

  /**
   * @return bool
   */
  public function getAdminPersonne()
  {
    return $this->per_admin;
  }

  /**
   * @return string
   */
  public function getLoginPersonne()
  {
    return $this->per_login;
  }

  /**
   * @return mixed
   */
  public function getPwdPersonne()
  {
    return $this->per_pwd;
  }
}
