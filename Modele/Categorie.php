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
require_once('Framework/Modele.php');
require_once('salle.php');

/**
 * @access public
 * @author vincent
 */
class Categorie extends Modele {
	/**
	 * @AttributeType string
	 */
	private $nom_categorie;
	private $horaire_dbt_reserv;
	private $horaire_fin_reserv;
	/**
	* attribut id int
	**/
	private $id_categorie;
	
	/**
	 * @AssociationType salle
	 * @AssociationMultiplicity *
	 * @AssociationKind Aggregation
	 */
	private $salles = array();

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
	* Fonction add de la classe Salle
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'nom_categorie' => $this->nom_categorie,
			'horaire_dbt_reserv' => $this->horaire_dbt_reserv,
			'horaire_fin_reserv' => $this->horaire_fin_reserv,
		);
		$retour = parent::add($tab);
		return $retour;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getNom() {
		return $this->nom_categorie;
	}

	/**
	 * @access public
	 * @param string PNom
	 * @return void
	 * @ParamType PNom string
	 * @ReturnType void
	 */
	public function setNom($PNom) {
		$this->nom_categorie = $PNom;
	}

	/**
	 * @access public
	 */
	public function getHoraire_dbt_reserv() {
		return $this->horaire_dbt_reserv;
	}

	/**
	 * @access public
	 * @param PHoraire_dbt_reserv
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setHoraire_dbt_reserv($PHoraire_dbt_reserv) {
		$this->horaire_dbt_reserv = $PHoraire_dbt_reserv;
	}

	/**
	 * @access public
	 */
	public function getHoraire_fin_reserv() {
		return $this->horaire_fin_reserv;
	}

	/**
	 * @access public
	 * @param PHoraire_fin_resev
	 * @return void
	 * 
	 * @ReturnType void
	 */
	public function setHoraire_fin_reserv($PHoraire_fin_resev) {
		$this->horaire_fin_reserv = $PHoraire_fin_resev;
	}

	/**
	 * @access public
	 */
	public function getSalle() {
		return $this->salle;
	}

	/**
	 * @access public
	 * @param string PSalle
	 * @return void
	 * @ParamType PSalle string
	 * @ReturnType void
	 */
	public function setSalle($PSalle) {
		foreach ($PNumReserv as $key => $value) {
        	$numReserv[$key] = $value;
        }
	}
}
?>