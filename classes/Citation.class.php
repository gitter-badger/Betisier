<?php
class Citation {
  private $cit_num;
  private $per_num;
  private $per_num_valide;
  private $per_num_etu;
  private $cit_libelle;
  private $cit_date;
  private $cit_valide;
  private $cit_date_valide;
  private $cit_date_depo;

public function __construct($valeurs =array()){
  if(!empty($valeurs)){
      $this->affecte($valeurs);
  }
}

public function affecte($donnees){
  foreach ($donnees as $attribut => $valeur) {
    switch($attribut){
      case 'cit_num': $this->setNumCitation($valeur);
      break;
      case 'per_num': $this->setNumPersonneCitation($valeur);
      break;
      case 'per_num_valide': $this->setNumPersonneValide($valeur);
      break;
      case 'per_num_etu': $this->setNumPersonneEtu($valeur);
      break;
      case 'cit_libelle': $this->setCitationLibelle($valeur);
      break;
      case 'cit_date': $this->setCitationDate($valeur);
      break;
      case 'cit_valide': $this->setCitationValide($valeur);
      break;
      case 'cit_date_valide': $this->setCitationDateValidite($valeur);
      break;
      case 'cit_date_depo': $this->setCitationDateDepo($valeur);
      break;
    }
  }
}

public function setNumCitation($num){
  $this->cit_num = $num;
}

public function setNumPersonneCitation($numPers){
  $this->per_num = $numPers;
}

public function setNumPersonneValide($numPersVal){
  $this->per_num_valide = $numPersVal;
}

public function setNumPersonneEtu($numPersEtu){
  $this->per_num_etu = $numPersEtu;
}

public function setCitationLibelle($libelle){
  $this->cit_libelle = $libelle;
}

public function setCitationDate($date){
  $this->cit_date = $date;
}

public function setCitationValide($vali){
  $this->cit_valide = $vali;
}

public function setCitationDateValidite($dateValid){
  $this->cit_date_valide = $dateValid;
}

public function setCitationDateDepo($depo){
  $this->cit_date_depo = $depo;
}

public function getNumCitation(){
  return $this->cit_num;
}

public function getNumPersonneCitation(){
  return $this->per_num;
}

public function getNumPersonneValide(){
  return $this->per_num_valide;
}

public function getNumPersonneEtu(){
  return $this->per_num_etu;
}

public function getCitationLibelle(){
  return $this->cit_libelle;
}

public function getCitationDate(){
  return $this->cit_date;
}

public function getCitationValide(){
  return $this->cit_valide;
}

public function getCitationDateValidite(){
  return $this->cit_date_valide;
}

public function getCitationDateDepo(){
  return $this->cit_date_depo;
}
}
?>
