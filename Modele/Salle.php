<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Framework/Modele.php');
require_once('Modele/Categorie.php');
require_once('Modele/Reservation.php');

/**
 * @access public
 * @author bruno
 */
class Salle extends Modele {
    private $id_salle;
	private $nom_salle;
	/**
	 * @AttributeType int
	 */
	private $tarif = array();
	/**
	 * @AssociationType categorie
	 * @AssociationMultiplicity 1
	 */
	private $id_categorie;
	/**
	 * @AssociationType reservation
	 * @AssociationMultiplicity *
	 */
	private $numReserv = array();

	/**
	*
	* Constructeur Ne fait rien de particulier =/
	*
	**/

	public function __construct() {
	}

	/**
	*
	* Fonction add de la classe Salle
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'nom_salle' => $this->nom_salle,
			'tarif1' => $this->tarif[1],
			'tarif2' => $this->tarif[2],
			'tarif3' => $this->tarif[3],
			'categorie' => $this->categorie,
		);
		$retour = parent::add($tab);

		return $retour;
	}

	/**
     * Gets the value of id_salle.
     *
     * @return mixed
     */
    public function getId_salle()
    {
        return $this->id_salle;
    }
	
    /**
     * Sets the value of tarif.
     *
     * @param array $PTarif Tableau avec les tarifs
     *
     */
    public function getNom_salle()
    {
        return $this->nom_salle;
    }

    /**
     * Sets the value of nom_salle.
     *
     * @param mixed $nom_salle the nom_salle
     *
     */
    public function setNom_salle($PNom_salle)
    {
        $this->nom_salle = $nom_salle;
    }

    /**
     * Gets the value of tarif.
     *
     * @return mixed
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Sets the value of tarif.
     *
     * @param array $PTarif Tableau avec les tarifs
     *
     */
    public function setTarif($PTarif)
    {
        foreach ($PTarif as $key => $value) {
        	$tarif[$key] = $value;
        }
    }

    /**
     * Gets the value of id_categorie.
     *
     * @return mixed
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Sets the value of categorie.
     *
     * @param objet $PId_categorie objet Categorie
     *
     */
    public function setId_categorie($PId_categorie)
    {
        $this->id_categorie = $PId_categorie->getId_categorie();
    }

    /**
     * Gets the object of id_categorie.
     *
     * @return objet categorie
     */

    public function getCategorie() {
        return salle::getById($this->getId_categorie());
    }

    /**
     * Gets the value of numReserv.
     *
     * @return mixed
     *
     */
    public function getNumReserv()
    {
        return $this->numReserv;
    }

    /**
     * Sets the value of numReserv.
     *
     * @param array $numReserv Tableau d'objet Reservation
     */
    public function setNumReserv($PNumReserv)
    {
        foreach ($PNumReserv as $value) {
        	$numReserv[] = $value->getId_reservation();
        }
    }

    /**
     * Gets the objet of numReserv.
     *
     * @return object class Reservation
     *
     */

    public function getReserv() {
        return Reservation::getBy('id_salle', $this->getId_salle());
    }
}
?>