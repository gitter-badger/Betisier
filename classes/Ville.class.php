<?php
class Ville {
  private $vil_num;
  private $vil_nom;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'vil_num': $this->setNumVille($valeur);
      break;
      case 'vil_nom': $this->setNomVille($valeur);
      break;
    }
  }
}

public function setNomVille($nom){
  $this->vil_nom = $nom;
}

public function setNumVille($id){
  $this->vil_num = $id;
}

public function getNomVille(){
  return $this->vil_nom;
}

public function getNumVille(){
  return $this->vil_num;
}
}
?>
