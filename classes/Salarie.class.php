<?php
class Salarie extends Personne {
  private $per_num;
  private $sal_telprof;
  private $fon_num;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'per_num': $this->setNumSal($valeur);
      break;
      case 'sal_telprof': $this->setTelSal($valeur);
      break;
      case 'fon_num': $this->setNumFonctSal($valeur);
      break;
    }
  }
}

public function setNumSal($num){
  $this->per_num = $num;
}

public function setTelSal($tel){
  $this->sal_telprof = $tel;
}

public function setNumFonctSal($numfct){
  $this->fon_num = $numfct;
}

public function getNumSal(){
  return $this->per_num;
}

public function getTelSal(){
  return $this->sal_telprof;
}

public function getNumFonctSal(){
  return $this->fon_num;
}
}
?>
