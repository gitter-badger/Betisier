<?php
class VilleManager {

public function __construct($db){
  $this->db = $db;
}

public function getListVille(){
  $listeVilles = array();
  $sql = 'SELECT vil_num, vil_nom FROM ville';
  $req = $this->db->query($sql);

  while ($ville = $req->fetch(PDO::FETCH_OBJ)){
    $listeVilles[] = new Ville($ville);
  }
  return $listeVilles;
  $req -> closeCursor();
}

public function getNbrVille(){
  $nbrVille = array();
  $sql = 'SELECT count(*) FROM ville';
  $req = $this->db->query($sql);
  while ($result = $req->fetch(PDO::FETCH_NUM)){
    $nbrVille[] = $result;
  }
  return $nbrVille;
  $req -> closeCursor();
}

public function villeExiste($vil_nom){
  $req=$this->db->prepare('SELECT vil_num, vil_nom FROM ville WHERE vil_nom=:vil_nom');
  $req->bindValue(':vil_nom',$vil_nom,PDO::PARAM_STR);
  $req->execute();
  $villeExiste = $req->fetch(PDO::FETCH_OBJ);
  $ville = new Ville($villeExiste);
  $req -> closeCursor();
  if ($ville->getNumVille()) {
    return true;
  } else {
    return false;
  }
}

public function ajouterVille($vil_nom){
  $req=$this->db->prepare('INSERT INTO ville (vil_nom) VALUES (:vil_nom) ');
  $req->bindValue(':vil_nom',$vil_nom,PDO::PARAM_STR);
  $req->execute();
}

}
?>
