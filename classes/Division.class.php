<?php
class Division {
  /**
   * @var int
   */
  private $div_num;
  /**
   * @var string
   */
  private $div_nom;

  /**
   * Division constructor.
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
        case 'div_num':
          $this->setNumDiv($valeur);
          break;
        case 'div_nom':
          $this->setNomDiv($valeur);
          break;
      }
    }
  }

  /**
   * @param $id
   */
  public function setNumDiv($id)
  {
    $this->div_num = $id;
  }

  /**
   * @param $nom
   */
  public function setNomDiv($nom)
  {
    $this->div_nom = $nom;
  }

  /**
   * @return int
   */
  public function getNumDiv()
  {
    return $this->div_num;
  }

  /**
   * @return string
   */
  public function getNomDiv()
  {
    return $this->div_nom;
  }
}
