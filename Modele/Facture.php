<?php
require_once('Modele/Reservation.php');
require_once('Modele/Client.php');

class facture {
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
	private $client;
	/*
    * Nom de la table de la BDD utilisé dans cet classe
    */
	protected static $_table = 'facture';

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
     * Gets the value of numReserv.
     *
     * @return string
     *
     */
	public function getClient() {
		return $this->client;
	}

	/**
	 * @access public
	 * @param PClient
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setClient($PClient) {
		$this->client = $PClient;
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