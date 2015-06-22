<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*		getClient() : Objet;
*		getReserv() : Objet;
*       tout les guetters and setters
*
**/

// includes
require_once('Modele/Client.php');
require_once('Modele/Reservation.php');
require_once('Modele/Appartient.php');
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
			'identifiant' => $this->getIdentifiant(),
			'password' => $this->getPassword(),
			'mail' => $this->getMail(),
		);
		$retour = parent::add($tab);

		return $retour;
	}


	// Guetters and Setters

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
     * add or delete the client with ID.
     *
     * @param int $Pd_client Id du client
     * @param int $droit Le droit sur le client
     */
    // public function setClient($PId_client, $droit)
    // {
    //     $exist = false;
    //     if(is_null($this->getClient()))
    //         $this->client[] = Client::getById($PId_client);
    //     else {
    //         foreach($this->client as $key => $value) {
    //             if($value->getId_client() == $PId_client) {
    //                 $exist = true;
    //                 unset($this->client[$key]);
    //                 Appartient::deleteBy($PId_client);
    //             }
    //         }
    //         if($exist == false) {
    //             $this->client[] = Client::getById($PId_client);
    //             $appart = new Appartient();
    //             $appart->setId_client($PId_client);
    //             $appart->setI_user($this->getId_user());
    //             $appart->setDroit($droit);
    //             $appart->add();
    //         }
    //     }
    // }

    /**
     * Ajoute un client.
     *
     */
    public function addClient($col, $val, $droit) {
        $client = Client::getBy($col, $val);
        $appart = new Appartient();
        $appart->setId_client($client->getId_client());
        $appart->setId_user($this->getId_user());
        $appart->setDroit($droit);
        $appart->add();
        $this->client[] = $client;
    }

    /**
     * Supprime un client.
     *
     * @param string $col Colonne de la BDD
     * @param string $val Valeur de recherche
     */
    public function suppClient($col, $val) {
        $client = Client::getBy($col, $val);
        Appartient::deleteBy('id_client', $client->getId_client());
        $this->getClient();
    }

    /**
     * Gets the objet of id_client.
     *
     * @return object class Client
     *
     */

    public function getClient() {
        $lien = Appartient::getBy('id_user', $this->getId_user());
        array_pop($lien);
        foreach($lien as $value) {
            $client[] = Client::getById($value->getId_client());
        }
        return $this->client = $client;
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


    // public function getDroit(){
    //     return Appartient::getBy('id_user', $this->getId_user());
    // }
}
?>