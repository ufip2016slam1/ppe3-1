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
require_once('Modele/Client.php');
require_once('Modele/User.php');
require_once('Framework/Modele.php');

class Appartient extends Modele {
	private $droit;
	/**
	 * @AssociationType client
	 */
	private $id_client;
	/**
	 * @AssociationType reservation
	 */
	private $id_user;

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
	* Fonction add de la classe User
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'droit' => $this->droit,
			'id_client' => $this->id_client,
			'id_user' => $this->id_user,
		);
		$retour = parent::add($tab);

		return $retour;
	}
	
	// Guetteurs et Setteurs
	
	/**
	 * @access public
	 */
	public function getDroit() {
		return $this->droit;
	}

	/**
	 * @access public
	 * @param PDroit
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setDroit($PDroit) {
		$this->droit = $PDroit;
	}

	/**
	 * @access public
	 */
	public function getId_client() {
		return $this->id_client;
	}

	/**
	 * @access public
	 * @param PDroit
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setId_client($PClient) {
		$this->id_client = $PClient;
	}

	/**
	 * @access public
	 */
	public function getId_user() {
		return $this->id_user;
	}

	/**
	 * @access public
	 * @param PDroit
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setId_user($PUser) {
		$this->id_user = $PUser;
	}

}