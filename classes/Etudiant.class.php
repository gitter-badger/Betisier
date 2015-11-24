<?php

class Etudiant extends Personne {
    public static $COL_DEP_NUM = "dep_num";
    public static $COL_PER_NUM = "per_num";
    public static $COL_DIV_NUM = "div_num";
    private $per_num;
    private $dep_num;
    private $div_num;

    public function __construct($valeurs = array())
    {
        parent::__construct($valeurs);
        if (!empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
                case 'per_num':
                    $this->setNumSalEtudiant($valeur);
                    break;
                case 'dep_num':
                    $this->setNumDepEtudiant($valeur);
                    break;
                case 'div_num':
                    $this->setNumDiv($valeur);
                    break;
            }
        }
    }

    public function setNumSalEtudiant($num)
    {
        $this->per_num = $num;
    }

    public function setNumDepEtudiant($numdep)
    {
        $this->dep_num = $numdep;
    }

    public function setNumDiv($numDiv)
    {
        $this->div_num = $numDiv;
    }

    public function getNumSalEtudiant()
    {
        return $this->per_num;
    }

    public function getNumDepEtudiant()
    {
        return $this->dep_num;
    }

    public function getNumDiv()
    {
        return $this->div_num;
    }
}
