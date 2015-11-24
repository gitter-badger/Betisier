<?php
class Departement {
    /**
     * @var int
     */
    private $dep_num;
    /**
     * @var string
     */
    private $dep_nom;
    /**
     * @var int
     */
    private $vil_num;

    /**
     * Departement constructor.
     * @param array $valeurs
     */
    public function __construct($valeurs = array())
    {
        if (!empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    /**
     * @param $donnees
     */
    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            switch ($attribut) {
                case 'dep_num':
                    $this->setNumDep($valeur);
                    break;
                case 'dep_nom':
                    $this->setNomDep($valeur);
                    break;
                case 'vil_num':
                    $this->setNumVille($valeur);
                    break;
            }
        }
    }

    /**
     * @param $nom
     */
    public function setNomDep($nom)
    {
        $this->dep_nom = $nom;
    }

    /**
     * @param $num
     */
    public function setNumVille($num)
    {
        $this->vil_num = $num;
    }

    /**
     * @param $num
     */
    public function setNumDep($num)
    {
        $this->dep_num = $num;
    }

    /**
     * @return string
     */
    public function getNomDep()
    {
        return $this->dep_nom;
    }

    /**
     * @return int
     */
    public function getNumDep()
    {
        return $this->dep_num;
    }

    /**
     * @return int
     */
    public function getNumVille()
    {
        return $this->vil_num;
    }
}
