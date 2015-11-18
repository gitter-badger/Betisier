<?php

class FonctionManager {

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($fonction) {
        $req = $this->db->prepare(
                'INSERT INTO ville (fon_num, fon_libelle)
			VALUES (:fon_num, :fon_libelle)');

        $req->bindValues(':fon_num', $fonction->getFon_num(), PDO::PARAM_STR);
        $req->bindValues(':fon_libelle', $fonction->getFon_libelle(), PDO::PARAM_STR);

        $req->execute();
    }

    public function getList() {
        $listeFonctions = array();

        $sql = 'SELECT fon_num, fon_libelle
			FROM fonction ORDER BY fon_num';
        $req = $this->db->query($sql);

        while ($fonction = $req->fetch(PDO::FETCH_OBJ)) {
            $listeFonctions[] = new Fonction($fonction);
        }

        return $listeFonctions;
        $req->closeCursor();
    }

}

?>
