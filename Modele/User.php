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
 * @access public
 * @author bruno
 */
class User extends Modele {
	private $id_user;
	private $identifiant;
	private $password;
	private $mail;


	/**
	 * @AssociationType client
	 * @AssociationMultiplicity 1..*
	 */
	private $id_client = array();
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
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Gets the value of id_client.
     *
     * @return array int
     *
     */
    public function getId_client()
    {
        return $this->id_client;
    }

    /**
     * Sets the value of numReserv.
     *
     * @param array $numReserv Tableau d'objet Client
     */
    public function setId_client($PId_client)
    {
        foreach ($PId_client as $value) {
        	$client[] = $value->getId_client();
        }
    }

    /**
     * Gets the objet of id_client.
     *
     * @return object class Client
     *
     */

    public function getClient() {
        return Client::getBy('id_user', $this->getId_user());
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
        return Reservation::getBy('id_user', $this->getId_user());
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
}
?>