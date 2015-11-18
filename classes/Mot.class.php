<?php
class Mot {
  private $mot_id;
  private $mot_interdit;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'mot_id': $this->setIdMot($valeur);
      break;
      case 'mot_interdit': $this->setMotInterdit($valeur);
      break;
    }
  }
}

public function setIdMot($id){
  $this->mot_id = $id;
}

public function setMotInterdit($interd){
  $this->mot_interdit = $interd;
}

public function getIdMot(){
  return $this->mot_id;
}

public function getMotInterdit(){
  return $this->mot_interdit;
}
}
?>
