<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*		getFact() : Objet;
*		getUser() : Objet;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Modele/User.php');
require_once('Modele/Facture.php');
require_once('Framework/Modele.php');

/**
 * @access public
 * @author bruno
 */
class Client extends Modele {
	private $id_client;
	private $nom;
	private $prenom;
	private $raison_sociale;
	private $adresse;
	private $code_postal;

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
	private $ville;
	private $telephone;
	/**
	 * @AssociationType user
	 * @AssociationMultiplicity *
	 * @AssociationKind Aggregation
	 */
	private $id_user = array();
	/**
	 * @AssociationType facture
	 * @AssociationMultiplicity *
	 */
	private $numFact = array();

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
	* Fonction add de la classe Client
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'nom' => $this->getNom(),
			'prenom' => $this->getPrenom(),
			'raison_sociale' => $this->getRaison_sociale(),
			'adresse' => $this->getAdresse(),
			'code_postal' => $this->getCode_postal(),
			'ville' => $this->getVille(),
			'telephone' => $this->getTelephone()
		);
		$retour = parent::add($tab);
		return $retour;
	}

	// Guetteurs et Setteurs

	/**
     * Gets the value of id_client.
     *
     * @return mixed
     */
    public function getId_client()
    {
        return $this->id_client;
    }
	
	/**
	 * @access public
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @access public
	 * @param PNom
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setNom($PNom) {
		$this->nom = $PNom;
	}

	/**
	 * @access public
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * @access public
	 * @param PPrenom
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setPrenom($PPrenom) {
		$this->prenom = $PPrenom;
	}

	/**
	 * @access public
	 */
	public function getRaison_sociale() {
		return $this->raison_sociale;
	}

	/**
	 * @access public
	 * @param PRaison_sociale
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setRaison_sociale($PRaison_sociale) {
		$this->raison_sociale = $PRaison_sociale;
	}

	/**
	 * @access public
	 */
	public function getAdresse() {
		return $this->adresse;
	}

	/**
	 * @access public
	 * @param PAdresse
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setAdresse($PAdresse) {
		$this->adresse = $PAdresse;
	}

	/**
     * Gets the value of id_user.
     *
     * @return array int
     *
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Sets the value of id_user.
     *
     * @param array $PId_user Tableau d'objet User
     */
    public function setId_user($PId_user)
    {
        foreach ($PId_user as $value) {
        	$numReserv[] = $value->getId_user();
        }
    }

    /**
     * Gets the objet of id_user.
     *
     * @return object class User
     *
     */

    public function getUser() {
        return User::getBy('id_client', $this->getId_client());
    }

	/**
     * Gets the value of numFact.
     *
     * @return array int
     *
     */
    public function getNumFact()
    {
        return $this->numFact;
    }

    /**
     * Sets the value of numFact.
     *
     * @param array $numFact Tableau d'objet Facture
     */
    public function setNumFact($PNumFact)
    {
        foreach ($PNumFact as $value) {
        	$numFact[] = $value->getId_facture();
        }
    }

    /**
     * Gets the objet of numFact.
     *
     * @return object class Facture
     *
     */

    public function getFact() {
        return Facture::getBy('id_Client', $this->getId_client());
    }
}