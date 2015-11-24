<?php

class DivisionManager {
    /**
     * DivisionManager constructor.
     * @param $db MyPdo
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * @param $division Division
     */
    public function add($division) {
        $req = $this->db->prepare(
            'INSERT INTO division (div_num, div_nom)
			VALUES (:div_num, :div_nom)');

        $req->bindParam(':div_num', $division->getNumDiv(), PDO::PARAM_STR);
        $req->bindParam(':div_nom', $division->getNomDiv(), PDO::PARAM_STR);

        $req->execute();
    }

    /**
     * @return Division[]
     */
    public function getList() {
        $listeDivisions = array();

        $sql = 'SELECT div_num, div_nom
			FROM division ORDER BY div_num';
        $req = $this->db->query($sql);

        while ($division = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDivisions[] = new Division($division);
        }
        $req->closeCursor();
        return $listeDivisions;
    }

}
