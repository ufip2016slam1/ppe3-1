<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*		addClient(string $PClient, int $PDroit) : void;
*		getClient() : void;
*		deleteClient(string $PClient) : void;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Modele/Client.php');
require_once('Modele/Reservation.php');
require_once('Framework/Modele.php');

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*       addClient(string Client, int Droit) : Objet;
*       tout les guetteurs et setteurs
*
**/

class User extends Modele {
	private $id_user;
	private $identifiant;
	private $password;
	private $mail;
	/**
	 * @AssociationType client
	 * @AssociationMultiplicity 1..*
	 */
	private $client = array();
	/**
	 * @AssociationType reservation
	 * @AssociationMultiplicity *
	 */
	private $numReserv = array();

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
			'identifiant' => $this->identifiant,
			'password' => $this->password,
			'mail' => $this->mail,
		);
		$retour = parent::add($tab);

		return $retour;
	}

	/**
	*
	* Fonction addClient Ajoute un client a l'utilisateur
	*
	* @param string PClient Nom du client
	* @param int PDroit Numéro du niveau de droit
	**/
	
	public function addClient($PClient, $PDroit) {
		$this->client[$PClient] = $PDroit;
	}

	/**
	*
	* Fonction getClient Retourne le nom de client avec qui l'utilisateur est affilé
	*
	* @return Array Nom des client affilé avec l'utilisateur
	**/
	
	public function getClient() {
		$tabClient = array();
		foreach ($this->client as $key => $value) {
			$tabClient[] = $key;
		}
		return $tabClient;
	}

	/**
	*
	* Fonction deleteClient Supprime un client affilé avec l'utilisateur
	*
	* @param string PClient Nom du client
	**/
	
	public function deleteClient($PClient) {
		unset($this->client[$PClient]);
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
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @access public
	 * @param PPassword
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setPassword($PPassword) {
		$this->password = $PPassword;
	}

	/**
	 * @access public
	 */
	public function getIdentifiant() {
		return $this->identifiant;
	}

	/**
	 * @access public
	 * @param PLogin
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setIdentifiant($PLogin) {
		$this->identifiant = $PLogin;
	}
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }
}
?>