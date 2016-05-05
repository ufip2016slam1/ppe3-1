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
	private $user = array();
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
			'code_postal' => $this->getCodePostal(),
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
     * Ajoute un user au client.
     *
     * @param string $col Colonne de la BDD
     * @param string $val Valeur de recherche
     * @param int $droit Le droit avec le user
     */
    public function addUser($val) {
        $user = User::getById($val);

		$existe = Appartient::getDroitBy($val, $this->id_client);
		if($existe)
			return;
        $appart = new Appartient();
        $appart->setId_client($this->getId_client());
        $appart->setId_user($user->getId_user());
        $appart->setDroit(1);
        $appart->add();
        $this->user[] = $user;
    }

    /**
     * Supprime un user du client.
     *
     * @param string $col Colonne de la BDD
     * @param string $val Valeur de recherche
     */
    public function suppUser($user) {
        /*$user = User::getBy($col, $val);
        Appartient::deleteBy('id_client', $user->getId_user());
        $this->getUser();*/
        $idUser = $user->getId_user();
        $sql = 'DELETE from appartient
                WHERE id_client = '.$this->getId_client().'
                AND id_user = '.$idUser;
        self::executerRequete($sql);
    }

    /**
     * Gets the objet of user.
     *
     * @return object class User
     *
     */

    public function getUser() {
    	$lien = Appartient::getBy('id_client', $this->getId_client());
        if (is_array($lien)){
            array_pop($lien);
            foreach($lien as $value) {
                $user[] = User::getById($value->getId_user());
            }
            return $this->user = $user;
        }
        if ($lien)
            return User::getById($lien->getId_user());
        else
            return false;

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