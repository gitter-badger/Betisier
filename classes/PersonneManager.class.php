<?php
class PersonneManager {

public function __construct($db){
  $this->db = $db;
}

public function getListPersonne(){
  $listePersonnes = array();
  $sql = 'SELECT per_num, per_nom, per_prenom FROM personne p';
  $req = $this->db->query($sql);
    while ($personne = $req->fetch(PDO::FETCH_OBJ)){
      $listePersonnes[] = new Personne($personne);
    }
    return $listePersonnes;
    $req -> closeCursor();
}

public function getPersonnesByLogin($per_login){
  $listePersonnes = array();
  $sql = "SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_admin, per_login, per_pwd FROM personne
  WHERE per_login ='".$per_login."'";
  $req = $this->db->query($sql);
    while ($personne = $req->fetch(PDO::FETCH_OBJ)){
      $listePersonnes[] = new Personne($personne);
    }
    return $listePersonnes;
    $req -> closeCursor();
}

public function getPersonneByNum($per_num){
  $listePersonnes = array();
  $sql = "SELECT per_num, per_nom, per_prenom, per_tel, per_mail, per_admin, per_login, per_pwd FROM personne p
  WHERE p.per_num =".$per_num;
  $req = $this->db->query($sql);
    while ($personne = $req->fetch(PDO::FETCH_OBJ)){
      $listePersonnes[] = new Personne($personne);
    }
    return $listePersonnes;
    $req -> closeCursor();
}

public function getNbrPers(){
  $nbrPers = array();
  $sql = 'SELECT count(*) FROM personne p';
  $req = $this->db->query($sql);
  while ($result = $req->fetch(PDO::FETCH_NUM)){
    $nbrPers[] = $result;
  }
  return $nbrPers;
  $req -> closeCursor();
}

public function estEtudiant($per_num){
  $req=$this->db->prepare('SELECT * FROM etudiant WHERE per_num=:per_num AND per_num IN (SELECT per_num FROM personne)');
  $req->bindValue(':per_num',$per_num,PDO::PARAM_INT);
  $req->execute();
  $estEtudiant = $req->fetch(PDO::FETCH_OBJ);
  $etudiant = new Etudiant($estEtudiant);
  $req -> closeCursor();
  if ($etudiant->getNumSalEtudiant()) {
    return true;
  } else {
    return false;
  }
}

public function estAdmin($per_num){
  $req=$this->db->prepare('SELECT * FROM personne WHERE per_num=:per_num AND per_admin=1');
  $req->bindValue(':per_num',$per_num,PDO::PARAM_INT);
  $req->execute();
  $estAdmin = $req->fetch(PDO::FETCH_OBJ);
  $personne = new Personne($estAdmin);
  $req -> closeCursor();
  if ($personne->getNumPersonne()) {
    return true;
  } else {
    return false;
  }
}

public function loginExiste($per_login){
  $req=$this->db->prepare('SELECT per_num FROM personne WHERE per_login=:per_login');
  $req->bindValue(':per_login',$per_login,PDO::PARAM_STR);
  $req->execute();
  $personneExiste = $req->fetch(PDO::FETCH_OBJ);
  $personne = new Personne($personneExiste);
  $req -> closeCursor();
  if ($personne->getNumPersonne()) {
    return true;
  } else {
    return false;
  }
}

public function ajouterPersonne($personne){
     $req= $this->db->prepare('INSERT INTO personne (per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd) VALUES (:per_nom, :per_prenom, :per_tel, :per_mail, :per_login, :per_pwd)');
     $req->bindValue(':per_nom', $personne->getNomPersonne(), PDO::PARAM_STR);
     $req->bindValue(':per_prenom', $personne->getPrenomPersonne(), PDO::PARAM_STR);
     $req->bindValue(':per_tel', $personne->getTelPersonne(), PDO::PARAM_INT);
     $req->bindValue(':per_mail', $personne->getMailPersonne(), PDO::PARAM_INT);
     $req->bindValue(':per_login', $personne->getLoginPersonne(), PDO::PARAM_STR);
     $req->bindValue(':per_pwd', $personne->getPwdPersonne(), PDO::PARAM_STR);
     $req->execute();
}

}
?>
