<?php
class Departement {
  private $dep_num;
  private $dep_nom;
  private $vil_num;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
      switch($attribut){
      case 'dep_num': $this->setNumDep($valeur);
      break;
      case 'dep_nom': $this->setNomDep($valeur);
      break;
      case 'vil_num': $this->setNumVille($valeur);
      break;
    }
  }
}

public function setNomDep($nom){
  $this->dep_nom = $nom;
}

public function setNumVille($num){
  $this->vil_num = $num;
}

public function setNumDep($num){
  $this->dep_num = $num;
}

public function getNomDep(){
  return $this->dep_nom;
}

public function getNumDep(){
  return $this->dep_num;
}

public function getNumVille(){
  return $this->vil_num;
}
}
?>
