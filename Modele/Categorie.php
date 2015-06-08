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
	private $id_salles = array();

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
	
	// Guetteurs et Setteurs
	
	/**
     * Gets the value of id_categorie.
     *
     * @return mixed
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
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
	public function getId_salle() {
		return $this->id_salle;
	}

	/**
	 * @access public
	 * @param objet PId_salle
	 * @return void
	 * @ParamType PId_salle objet
	 * @ReturnType void
	 */
	public function setId_salle($PId_salle) {
		foreach ($PId_salle as $value) {
        	$numSalle[] = $value->getId_salle();
        }
	}

	/**
     * Gets the objet of id_salle.
     *
     * @return object class Salle
     *
     */

    public function getSalle() {
        return Salle::getBy('id_categorie', $this->getId_categorie());
    }
}
?>