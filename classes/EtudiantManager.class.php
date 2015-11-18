<?php
class EtudiantManager {

public function __construct($db){
  $this->db = $db;
}

public function getDetailEtud($per_num){
  $listePersonnes = array();
  $sql = "SELECT per_prenom, per_mail, per_tel, dep_nom, vil_nom, per_nom FROM personne p, etudiant e, departement d, ville v
  WHERE p.per_num =".$per_num." AND e.per_num = p.per_num AND e.dep_num = d.dep_num AND d.vil_num = v.vil_num";
  $req = $this->db->query($sql);
    while ($personne = $req->fetch(PDO::FETCH_NUM)){
      $listePersonnes[] = $personne;
    }
    return $listePersonnes;
    $req -> closeCursor();
}
}
?>
