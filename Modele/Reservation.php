<?php

/**
*
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*       getAllPeriode(Datetime debut, Datetime fin) : Objet;
*       ajaxGetAll() : Objet dedié au calendrier recupere les reservations avec date_annule NULL ;
*       getFacture() : Objet;
*       getClient() : Objet;
*       getSalle() : Objet;
*       getUser() : Objet;
*       getRepetition : Objet;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Framework/Modele.php');
require_once('Modele/Repetition.php');
require_once('Modele/User.php');
require_once('Modele/Salle.php');
require_once('Modele/Client.php');
require_once('Modele/Facture.php');

/**
 * @access public
 * @author bruno
 */
class Reservation extends Modele {
	// Variables
	private $id_reservation;
	private $date_dbt;
	private $date_fin;
	private $date_reserv;
	private $date_annule;
	private $id_repetition;
	/**
	 * @AssociationType user
	 * @AssociationMultiplicity 1
	 */
	private $id_user;
	/**
	 * @AssociationType salle
	 * @AssociationMultiplicity 1
	 */
	private $id_salle;
    /**
     * @AssociationType salle
     * @AssociationMultiplicity 1
     */
	private $id_client;
	/**
	 * @AssociationType facture
	 * @AssociationMultiplicity 1
	 */
	private $id_facture;

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
	* Fonction add de la classe Reservation
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/
	
	public function add($tableau = Null) {
		$tab = array(
			'date_dbt' => $this->getDate_dbt(),
			'date_fin' => $this->getDate_fin(),
			'date_reserv' => $this->getDate_reserv(),
			'date_annule' => $this->getDate_annule(),
            'id_user' => $this->getId_user()->getId_user(),
            'id_salle' => $this->getId_salle(),
            'id_client' => $this->getId_client(),
		);
		$retour = parent::add($tab);
        
		return $retour;
	}
    

    /**
    *
    * Fonction getAllPeriode Retourne les reservation qui on débuter entre une periode
    * 
    * @param datetime dbt Debut de la periode
    * @param datetime fin Fin de la periode
    * @return Objet Resultat de la requête
    **/

    public static function getAllPeriode($dbt, $fin) {
        $sql = 'SELECT * FROM '.strtolower(get_called_class()).' WHERE date_dbt BETWEEN :dbt AND :fin';
        $retour = self::executerRequete($sql, array(
            'dbt' => $dbt, 'fin' => $fin,
        ));
        while ($sortie [] = $retour->fetchObject(strtolower(get_called_class())));
        return $sortie;
    }

    public static function getPeriodeBy($dbt, $fin, $col, $val) {
        $sql = 'SELECT * FROM '.strtolower(get_called_class()).' WHERE date_dbt BETWEEN :dbt AND :fin '
        .'AND :colonne = :valeur';
        $retour = self::executerRequete($sql, array(
            'dbt' => $dbt, 'fin' => $fin, 'colonne' => $col, 'valeur' => $val,
        ));
        while ($sortie [] = $retour->fetchObject(strtolower(get_called_class())));
        return $sortie;
    }

    /**
    *
    * Fonction ajaxGetAll
    * commentaire : Objet dedié au calendrier recupere les reservations avec date_annule NULL ;
    * @return Objet Resultat de la requête lorque date_annule IS NULL
    *
    **/
    public static function ajaxGetAll(){
        
        $sql = 'SELECT * FROM '.strtolower(get_called_class()).' WHERE date_annule IS NULL ';
        $retour = self::executerRequete($sql);

        while ($sortie [] = $retour->fetchObject(strtolower(get_called_class())));
        //$sortie = array_slice($sortie, 0, -1); // on enleve la derniere case du tableau false pour utiliser des boucles foreach

        return $sortie;
    
    }


	// Guetteurs and Setters

    /**
     * Gets the value of id_reservation.
     *
     * @return mixed
     */
    public function getId_reservation()
    {
        return $this->id_reservation;
    }

    /**
     * Gets the value of date_dbt.
     *
     * @return mixed
     */
    public function getDate_dbt()
    {
        return $this->date_dbt;
    }

    /**
     * Sets the value of date_dbt.
     *
     * @param mixed $date_dbt the date_dbt
     *
     * @return void
     */
    public function setDate_dbt($date_dbt)
    {
        $this->date_dbt = $date_dbt;
    }

    /**
     * Gets the value of date_fin.
     *
     * @return mixed
     */
    public function getDate_fin()
    {
        return $this->date_fin;
    }

    /**
     * Sets the value of date_fin.
     *
     * @param mixed $date_fin the date_fin
     *
     * @return void
     */
    public function setDate_fin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    /**
     * Gets the value of date_reserv.
     *
     * @return mixed
     */
    public function getDate_reserv()
    {
        return $this->date_reserv;
    }

    /**
     * Sets the value of date_reserv.
     *
     * @param mixed $date_reserv the date_reserv
     *
     * @return void
     */
    public function setDate_reserv($date_reserv)
    {
        $this->date_reserv = $date_reserv;
    }

    /**
     * Gets the value of date_annule.
     *
     * @return mixed
     */
    public function getDate_annule()
    {
        return $this->date_annule;
    }

    /**
     * Sets the value of date_annule.
     *
     * @param mixed $date_annule the date_annule
     *
     * @return void
     */
    public function setDate_annule($date_annule)
    {
        $this->date_annule = $date_annule;
    }

    /**
     * Gets the value of id_repeat.
     *
     * @return mixed
     */
    public function getId_repetition()
    {
        return $this->id_repetition;
    }

    /**
     * Sets the value of id_repeat.
     *
     * @param object $PId_repeat Object class Repetition
     *
     * @return void
     */
    public function setId_repetition($PId_repetition)
    {
        $this->id_repetition = $PId_repetition->getId_repetition();
    }

    /**
     * Gets the object of id_repeat.
     *
     * @return objet repeat
     */

    public function getRepetition() {
        return Repetition::getById($this->getId_repetition());
    }

    /**
     * Gets the value of id_user.
     *
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Sets the value of id_user.
     *
     * @param object $PId_user Object class User
     *
     * @return void
     */
    public function setId_user($PId_user)
    {
        $this->id_user = $PId_user;//->getId_user();
    }

    /**
     * Gets the object of id_user.
     *
     * @return objet user
     */

    public function getUser() {
        return User::getById($this->getId_user());
    }

    /**
     * Gets the value of id_salle.
     *
     * @return mixed
     */
    public function getId_salle()
    {
        return $this->id_salle;
    }

    /**
     * Sets the value of id_salle.
     *
     * @param object $PId_salle Object class Salle
     *
     * @return void
     */
    public function setId_salle($PId_salle)
    {
        $this->id_salle = $PId_salle->getId_salle();

        return $this;
    }

    /**
     * Gets the object of id_salle.
     *
     * @return objet salle
     */

    public function getSalle() {
        return Salle::getById($this->getId_salle());
    }

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
     * Sets the value of id_client.
     *
     * @param object $PId_client Object class Client
     *
     * @return void
     */
    public function setId_client($PId_client)
    {
        $this->id_client = $PId_client->getId_client();
    }

    /**
     * Gets the object of id_client.
     *
     * @return objet client
     */

    public function getClient() {
        return Client::getById($this->getId_client());
    }

    /**
     * Gets the value of id_facture.
     *
     * @return mixed
     */
    public function getId_facture()
    {
        return $this->id_facture;
    }

    /**
     * Sets the value of id_facture.
     *
     * @param object $PId_facture Object class Facture
     *
     * @return void
     */
    public function setId_facture($PId_facture)
    {
        $this->id_facture = $PId_facture->getId_facture();
    }

    /**
     * Gets the object of id_facture.
     *
     * @return objet facture
     */

    public function getFacture() {
        return Facture::getById($this->getId_facture());
    }
}