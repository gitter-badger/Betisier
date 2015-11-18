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
        $req = $this->db->prepare(
                'INSERT INTO departement (dep_num, dep_nom, dep_vil)
			VALUES (:dep_num, :dep_nom, :dep_vil)');

        $req->bindValues(':dep_num', $departement->getDep_num(), PDO::PARAM_STR);
        $req->bindValues(':dep_nom', $departement->getDep_nom(), PDO::PARAM_STR);
        $req->bindValues(':dep_vil', $departement->getDep_vil(), PDO::PARAM_STR);


        $req->execute();
    }

    /**
     * @return Departement[]
     */
    public function getList() {
        $listeDepartements = array();

        $sql = 'SELECT dep_num, dep_nom, dep_vil
			FROM departement ORDER BY dep_num';
        $req = $this->db->query($sql);

        while ($departement = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDepartements[] = new Departement($departement);
        }
        $req->closeCursor();
        return $listeDepartements;
    }
}

?>
