<?php
class Vote {
  private $cit_num;
  private $per_num;
  private $vot_valeur;

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
      case 'per_num': $this->setNumPersonnel($valeur);
      break;
      case 'vot_valeur': $this->setValeurVote($valeur);
      break;
    }
  }
}

public function setNumCitationVote($num){
  $this->cit_num = $num;
}

public function setNumPersonneVote($num){
  $this->per_num = $num;
}

public function setValeurVote($valeur){
  $this->vot_valeur = $valeur;
}

public function getNumCitationVote(){
  return $this->cit_num;
}

public function getNumPersonneVote(){
  return $this->per_num;
}

public function getValeurVote(){
  return $this->vot_valeur;
}
}
?>
