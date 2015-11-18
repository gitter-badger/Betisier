<?php

class MotManager {

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($mot) {
        $req = $this->db->prepare(
                'INSERT INTO ville (mot_id, mot_interdit)
			VALUES (:mot_id, :mot_interdit)');

        $req->bindValues(':mot_id', $mot->getMot_id(), PDO::PARAM_STR);
        $req->bindValues(':mot_interdit', $mot->getMot_interdit(), PDO::PARAM_STR);

        $req->execute();
    }

    public function getList() {
        $listeMots = array();

        $sql = 'SELECT mot_id, mot_interdit
			FROM mot ORDER BY mot_id';
        $req = $this->db->query($sql);

        while ($mot = $req->fetch(PDO::FETCH_OBJ)) {
            $listeMots[] = new Mot($mot);
        }

        return $listeMots;
        $req->closeCursor();
    }

}

?>
