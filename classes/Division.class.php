<?php
class Division {
  private $div_num;
  private $div_nom;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'div_num': $this->setNumDiv($valeur);
      break;
      case 'div_nom': $this->setNomDiv($valeur);
      break;
    }
  }
}

public function setNumDiv($id){
  $this->div_num = $id;
}

public function setNomDiv($nom){
  $this->div_nom = $nom;
}

public function getNumDiv(){
  return $this->div_num;
}

public function getNomDiv(){
  return $this->div_nom;
}
}
?>
