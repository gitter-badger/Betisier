<?php

class CitationManager {

public function __construct($db){
  $this->db = $db;
}

public function getListCitation(){
  $listeCita = array();
  $sql = 'SELECT per_prenom, per_nom, cit_libelle, cit_date_valide, avg(vot_valeur) FROM citation c, vote v, personne p
  WHERE c.per_num = p.per_num AND c.cit_num = v.cit_num AND c.cit_valide = 1 AND cit_date_valide is not null
  GROUP BY c.cit_num';
  $req = $this->db->query($sql);
  while ($result = $req->fetch(PDO::FETCH_NUM)){
    $listeCita[] = $result;
  }
  return $listeCita;
  $req -> closeCursor();
}

public function getNbrCitation(){
  $nbrCita = array();
  $sql = 'SELECT count(*) FROM citation c WHERE c.cit_valide = 1 AND cit_date_valide is not null';
  $req = $this->db->query($sql);
  while ($result = $req->fetch(PDO::FETCH_NUM)){
    $nbrCita[] = $result;
  }
  return $nbrCita;
  $req -> closeCursor();
}

}
