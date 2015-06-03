<?php
require_once('user.php');
require_once('facture.php');
require_once('Framework/Modele.php');

/**
 * @access public
 * @author vincent
 */
class client extends Modele {
	private $id_client;
	private $nom;
	private $prenom;
	private $raison_sociale;
	private $adresse;
	private $code_postal;
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
	/*
    * Nom de la table de la BDD utilisé dans cet classe
    */
	protected static $_table = 'client';

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
			'nom' => $this->nom,
			'prenom' => $this->prenom,
			'raison_sociale' => $this->raison_sociale,
			'adresse' => $this->adresse,
			'code_postal' => $this->code_postal,
			'ville' => $this->ville,
			'telephone' => $this->telephone
		);
		$retour = parent::add($tab);
		return $retour;
	}

	// Guetteurs et Setteurs

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
}
?>