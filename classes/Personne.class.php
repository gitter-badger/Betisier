<?php
class Personne {
  private $per_num;
  private $per_nom;
  private $per_prenom;
  private $per_tel;
  private $per_mail;
  private $per_admin;
  private $per_login;
  private $per_pwd;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'per_num': $this->setNumPersonne($valeur);
      break;
      case 'per_nom': $this->setNomPersonne($valeur);
      break;
      case 'per_prenom': $this->setPrenomPersonne($valeur);
      break;
      case 'per_tel': $this->setTelPersonne($valeur);
      break;
      case 'per_mail': $this->setMailPersonne($valeur);
      break;
      case 'per_admin': $this->setAdminPersonne($valeur);
      break;
      case 'per_login': $this->setLoginPersonne($valeur);
      break;
      case 'per_pwd': $this->setPwdPersonne($valeur);
      break;
      default ;
      break;
    }
  }
}

public function setNumPersonne($num){
  $this->per_num = $num;
}

public function setNomPersonne($nom){
  $this->per_nom = $nom;
}

public function setPrenomPersonne($prenom){
  $this->per_prenom = $prenom;
}

public function setTelPersonne($tel){
  $this->per_tel = $tel;
}

public function setMailPersonne($mail){
  $this->per_mail = $mail;
}

public function setAdminPersonne($adm){
  $this->per_admin = $adm;
}

public function setLoginPersonne($log){
  $this->per_login = $log;
}

public function setPwdPersonne($pwd){
  $this->per_pwd = $pwd;
}

public function getNumPersonne(){
  return $this->per_num;
}

public function getNomPersonne(){
  return $this->per_nom;
}

public function getPrenomPersonne(){
  return $this->per_prenom;
}

public function getTelPersonne(){
  return $this->per_tel;
}

public function getMailPersonne(){
  return $this->per_mail;
}

public function getAdminPersonne(){
  return $this->per_admin;
}

public function getLoginPersonne(){
  return $this->per_login;
}

public function getPwdPersonne(){
  return $this->per_pwd;
}
}
?>
