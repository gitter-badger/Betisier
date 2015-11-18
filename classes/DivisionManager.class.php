<?php

class DivisionManager {

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($division) {
        $req = $this->db->prepare(
                'INSERT INTO ville (div_num, div_nom)
			VALUES (:div_num, :div_nom)');

        $req->bindValues(':div_num', $division->getDiv_num(), PDO::PARAM_STR);
        $req->bindValues(':div_nom', $division->getDiv_nom(), PDO::PARAM_STR);

        $req->execute();
    }

    public function getList() {
        $listeDivisions = array();

        $sql = 'SELECT div_num, div_nom
			FROM division ORDER BY div_num';
        $req = $this->db->query($sql);

        while ($division = $req->fetch(PDO::FETCH_OBJ)) {
            $listeDivisions[] = new Division($division);
        }

        return $listeDivisions;
        $req->closeCursor();
    }

}

?>
