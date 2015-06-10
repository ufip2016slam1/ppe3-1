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
require_once('Modele/Reservation.php');
require_once('Modele/Client.php');

/**
 * @access public
 * @author bruno
 */
class Facture extends Modele {
	private $id_facture;
	private $date_fact;
	/**
	 * @AssociationType reservation
	 * @AssociationMultiplicity *
	 */
	private $numReserv = array();
	/**
	 * @AssociationType client
	 * @AssociationMultiplicity 1
	 */
	private $id_client;

	// Fonctions

	/**
	*
	* Constructeur Ne fait rien de particulier =/
	*
	**/

	public function __construct() {
	}

	/**
	*
	* Fonction add de la classe Facture
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'date_fact' => $this->date_fact,
		);
		$retour = parent::add($tab);

		return $retour;
	}

	/**
     * Gets the value of id_facture.
     *
     * @return mixed
     */
    public function getId_facture()
    {
        return $this->id_facture;
    }
	
	/**
     * Gets the value of numReserv.
     *
     * @return datetime
     *
     */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @access public
	 * @param PDate
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setDate($PDate) {
		$this->date = $PDate;
	}

	/**
     * Gets the value of id_client.
     *
     * @return int
     *
     */
	public function getId_client() {
		return $this->id_client;
	}

	/**
	 * @access public
	 * @param PId_client
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setId_client($PId_client) {
		$this->id_client = $PId_client->getId_client();
	}

	/**
     * Gets the objet of id_client.
     *
     * @return object class Client
     *
     */

    public function getClient() {
        return Client::getById($this->getId_client());
    }

	/**
     * Gets the value of numReserv.
     *
     * @return array int
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
        foreach ($PNumReserv as $key) {
        	$numReserv[$key] = $value->getId_reservation();
        }
    }

    /**
     * Gets the objet of numReserv.
     *
     * @return object class Reservation
     *
     */

    public function getReserv() {
        return Reservation::getBy('id_facture', $this->getId_facture());
    }
}
?>