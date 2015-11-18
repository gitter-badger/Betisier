<?php

class VoteManager {

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($vote) {
        $req = $this->db->prepare(
                'INSERT INTO ville (cit_num, per_num, vot_valeur)
			VALUES (:cit_num, :per_num, :vot_valeur)');

        $req->bindValues(':cit_num', $vote->getCit_num(), PDO::PARAM_STR);
        $req->bindValues(':per_num', $vote->getPer_num(), PDO::PARAM_STR);
        $req->bindValues(':vot_valeur', $vote->getVot_valeur(), PDO::PARAM_STR);

        $req->execute();
    }

    public function getList() {
        $listeVotes = array();

        $sql = 'SELECT cit_num, per_num, vot_valeur
			FROM vote ORDER BY cit_num';
        $req = $this->db->query($sql);

        while ($vote = $req->fetch(PDO::FETCH_OBJ)) {
            $listeVotes[] = new Vote($vote);
        }

        return $listeVotes;
        $req->closeCursor();
    }

}

?>
