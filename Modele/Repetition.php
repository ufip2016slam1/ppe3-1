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
require_once('Modele/Reservation.php');

class Facture extends Modele {
	private $id_repetition;
	private $date_deb_rep;
	private $date_fin_rep;
	private $pas;

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
	* Fonction add de la classe Repetition
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
    * @param array tableau Tableau des données du formulaire
	* @return Bool Réussite de la requete
	**/

	public function add($tableau = Null) {
		$tab = array(
			'date_deb_rep' => $this->date_deb_rep,
			'date_fin_rep' => $this->date_fin_rep,
			'pas' => $this->pas,
		);
		$retour = parent::add($tab);

		return $retour;
	}

	// Getteurs et Setteurs

	/**
     * Gets the value of id_repetition.
     *
     * @return mixed
     */

	public function getId_repetition() {
		return $this->id_repetition;
	}

	/**
     * Gets the value of date_deb_rep.
     *
     * @return mixed
     */

	public function getDate_deb_rep() {
		return $this->date_deb_rep;
	}

	/**
     * Sets the value of date_deb_rep.
     *
     * @param mixed $PDate_deb_rep the date_deb_rep
     *
     */

	public function setDate_deb_rep($PDate_deb_rep) {
		$this->date_deb_rep = $PDate_deb_rep;
	}

	/**
     * Gets the value of date_fin_rep.
     *
     * @return mixed
     */

	public function getDate_fin_rep() {
		return $this->Date_fin_rep;
	}

	/**
     * Sets the value of date_fin_rep.
     *
     * @param mixed $PDate_fin_rep the date_fin_rep
     *
     */

	public function setDate_fin_rep($PDate_fin_rep) {
		$this->date_fin_rep = $PDate_fin_rep;
	}

	/**
     * Gets the value of pas.
     *
     * @return mixed
     */

	public function getPas() {
		return $this->pas;
	}

	/**
     * Sets the value of pas.
     *
     * @param mixed $PPas the pas
     *
     */

	public function setPas($PPas) {
		$this->pas = $PPas;
	}
}