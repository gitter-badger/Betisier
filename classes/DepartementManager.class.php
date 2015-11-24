<?php

class DepartementManager {
    /**
     * DepartementManager constructor.
     * @param $db Mypdo
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * @param $departement Departement
     */
    public function add($departement) {
        $req = $this->db->prepare('INSERT INTO departement (dep_num, dep_nom,vil_num) VALUES (:dep_num, :dep_nom, :dep_vil)');

        $req->bindParam(':dep_num', $departement->getNumDep(), PDO::PARAM_INT);
        $req->bindParam(':dep_nom', $departement->getNomDep(), PDO::PARAM_STR);
        $req->bindParam(':dep_vil', $departement->getNumVille(), PDO::PARAM_INT);


        $req->execute();
    }

    /**
     * @return Departement[]
     */
    public function getList() {
        $listeDepartements = array();

        $sql = 'SELECT dep_num,dep_nom,vil_num FROM departement ORDER BY dep_num';
        $req = $this->db->query($sql);

        while ($departement = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDepartements[] = new Departement($departement);
        }
        $req->closeCursor();
        return $listeDepartements;
    }
}

