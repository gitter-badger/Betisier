<?php
class Fonction {
  private $fon_num;
  private $fon_libelle;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'fon_num': $this->setFonctionNum($valeur);
      break;
      case 'fon_libelle': $this->setFonctionLibelle($valeur);
      break;
    }
  }
}

public function setFonctionNum($num){
  $this->fon_num = $num;
}

public function setFonctionLibelle($libelle){
  $this->fon_libelle = $libelle;
}

public function getFonctionNum(){
  return $this->fon_num;
}

public function getFonctionLibelle(){
  return $this->fon_libelle;
}
}
?>
