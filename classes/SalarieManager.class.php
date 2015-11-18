<?php
class SalarieManager {

public function __construct($db){
  $this->db = $db;
}

public function getDetaiSal($per_num){
  $listePersonnes = array();
  $sql = "SELECT per_prenom, per_mail, per_tel, sal_telprof, fon_libelle, per_nom FROM personne p, salarie s, fonction f
  WHERE p.per_num =".$per_num." AND s.per_num = p.per_num AND f.fon_num = s.fon_num";
  $req = $this->db->query($sql);
    while ($personne = $req->fetch(PDO::FETCH_NUM)){
      $listePersonnes[] = $personne;
    }
    return $listePersonnes;
    $req -> closeCursor();
}

}
?>
