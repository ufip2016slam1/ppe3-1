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
	private $categorie;
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
     * Gets the value of categorie.
     *
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Sets the value of categorie.
     *
     * @param mixed $categorie the categorie
     *
     */
    public function setCategorie($PCategorie)
    {
        $this->categorie = $categorie;
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
     * @param array $numReserv Tableau des numéros de reservation
     */
    public function setNumReserv($PNumReserv)
    {
        foreach ($PNumReserv as $key => $value) {
        	$numReserv[$key] = $value;
        }
    }
}
?>