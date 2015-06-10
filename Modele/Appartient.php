<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*		getDroitBy(string PUser, string PClient) : Array;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Modele/Client.php');
require_once('Modele/User.php');
require_once('Framework/Modele.php');

/**
 * @access public
 * @author bruno
 */
class Appartient extends Modele {
	private $droit;
	/**
	 * @AssociationType client
	 */
	private $id_client;
	/**
	 * @AssociationType user
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
	* Fonction add de la classe Appartient
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données
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

	/**
	*
	* Fonction getDroitBy Retourne les droits en fonction du client et du user
	* 
    * @param int PUser Id du user
    * @param int PClient Id du client
	* @return Array Résutat de la requête sous forme de tableau
	**/

	public static function getDroitBy($PUser, $PClient) {
		$sql = 'SELECT droit FROM '.strtolower(get_called_class()).' WHERE id_user = :user AND id_client = :client';
        $retour = self::executerRequete($sql, array(
            'user' => $PUser, 'client' => $PClient,
        ));
        $result = $retour->fetch(PDO::FETCH_ASSOC);
        return $result;
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
	 * @param PClient
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
	 * @param PUser
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setId_user($PUser) {
		$this->id_user = $PUser;
	}

}