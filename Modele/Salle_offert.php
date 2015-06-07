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
require_once('Modele/Categorie.php');
require_once('Framework/Modele.php');

class Salle_offert extends Modele {
	private $nbre;
	/**
	 * @AssociationType client
	 */
	private $id_client;
	/**
	 * @AssociationType reservation
	 */
	private $id_categorie;

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
			'nbre' => $this->nbre,
			'id_client' => $this->id_client,
			'id_categorie' => $this->id_categorie,
		);
		$retour = parent::add($tab);

		return $retour;
	}
	
	// Guetteurs et Setteurs
	
	/**
	 * @access public
	 */
	public function getNbre() {
		return $this->nbre;
	}

	/**
	 * @access public
	 * @param PDroit
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setNbre($PNbre) {
		$this->nbre = $PNbre;
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
	public function getId_categorie() {
		return $this->id_categorie;
	}

	/**
	 * @access public
	 * @param PDroit
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setId_categorie($PCategorie) {
		$this->id_categorie = $PCategorie;
	}

}