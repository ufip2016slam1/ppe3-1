<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*		getNbreBy(int PClient, int PCategorie) : Array;
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

	/**
	*
	* Fonction getDroitBy Retourne les droits en fonction du client et du user
	* 
    * @param int PUser Id du client
    * @param int PUser Id de la categorie
	* @return Array Résutat de la requête sous forme de tableau
	**/

	public static function getNbreBy(PClient, PCategorie) {
		$sql = 'SELECT nbre FROM '.strtolower(get_called_class()).' WHERE id_client = :client AND id_categorie = :categorie';
        $retour = self::executerRequete($sql, array(
            'client' => $PClient, 'categorie' => $PCategorie,
        ));
        $result = $retour->fetch(PDO::FETCH_ASSOC);
        return $result;
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