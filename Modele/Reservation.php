<?php

/**
*
* Le constructeur (Date, Date, Date, Date, Int, Int, Int, Int)
*						OU (A voir)
* Le constructeur (Array)
*						OU
* Le constructeur ()
*
* Liste des fonctions disponible dans cet classe
*       add() : Bool;
*       getBy(String, String) : Objet;
*       tout les guetteurs et setteurs
*
**/

// includes
require_once('Modele.php');

class Reservation extends Modele {
	// Variables
	private $id_reservation;
	private $date_dbt;
	private $date_fin;
	private $date_reserv;
	private $date_annule;
	private $id_repeat;
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
	private $id_client;
	/**
	 * @AssociationType facture
	 * @AssociationMultiplicity 1
	 */
	private $id_facture;

	protected $_table = 'reservation';

	// Fonctions

	/**
	*
	* Constructeur initialise toute les variables sauf id_facture
	*
	**/
	
	public function __construct(/*$dd, $df, $dr, $ir, $is, $iu, $ic*/) {
		/*$this->seDate_dbt($dd);
		$this->setDate_fin($df);
		$this->setDate_reserv($dr);
		//$this->setDate_annule($da);
		$this->setId_repeat($ir);
		$this->setId_salle($is);
		$this->setId_user($iu);
		$this->setId_client($ic);*/
		//$this->setId_facture($if);
	}
	/*
							OU

	public function __construct($table) {
		foreach($table as $key => $value)
			$this->$key = $value;
	}
	*/

	/**
	*
	* Fonction add de la classe Reservation
	* Range toute les variables dans un tableau et l'ajoute a la BDD
	* 
	* @return Bool Réussite de la requete
	**/
	
	public function add() {
		$tab = array(
			'date_dbt' => $date_dbt,
			'date_fin' => $date_fin,
			'date_reserv' => $date_reserv,
			'date_annule' => NULL,
			'id_repeat' => $id_repeat,
			'id_salle' => $id_salle,
			'id_user' => $id_user,
			'id_client' => $id_client,
			'id_facture' => NULL,
		);
		$retour = parent::add($tab);
		return $retour;
	}

	/**
    *
    * Fonction getBy retoune un element en fonction d'une valeur
    *
    * @param string colonne Nom de la colonne ou effectuer les changements
    * @param string valeur Valeur des elements a sélectionner
    * @return Objet Resultat de la requete
    **/
    
    public function getBy($colonne, $valeur) {
        $sql = 'SELECT * FROM '.$this->_table.' WHERE '.$colonne.' = :valeur';
        $retour = $this->executerRequete($sql, array('valeur' => $valeur,));
        $sortie = $retour->fetchObject($this->_table);
        return $sortie;
    }



	// Guetteur and Setteur

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
     * Sets the value of id_reservation.
     *
     * @param mixed $id_reservation the id_reservation
     *
     * @return self
     */
    public function setId_reservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;

        return $this;
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
     * @return self
     */
    public function setDate_dbt($date_dbt)
    {
        $this->date_dbt = $date_dbt;

        return $this;
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
     * @return self
     */
    public function setDate_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
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
     * @return self
     */
    public function setDate_reserv($date_reserv)
    {
        $this->date_reserv = $date_reserv;

        return $this;
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
     * @return self
     */
    public function setDate_annule($date_annule)
    {
        $this->date_annule = $date_annule;

        return $this;
    }

    /**
     * Gets the value of id_repeat.
     *
     * @return mixed
     */
    public function getId_repeat()
    {
        return $this->id_repeat;
    }

    /**
     * Sets the value of id_repeat.
     *
     * @param mixed $id_repeat the id_repeat
     *
     * @return self
     */
    public function setId_repeat($id_repeat)
    {
        $this->id_repeat = $id_repeat;

        return $this;
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
     * @param mixed $id_user the id_user
     *
     * @return self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
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
     * @param mixed $id_salle the id_salle
     *
     * @return self
     */
    public function setId_salle($id_salle)
    {
        $this->id_salle = $id_salle;

        return $this;
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
     * @param mixed $id_client the id_client
     *
     * @return self
     */
    public function setId_client($id_client)
    {
        $this->id_client = $id_client;

        return $this;
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
     * @param mixed $id_facture the id_facture
     *
     * @return self
     */
    public function setId_facture($id_facture)
    {
        $this->id_facture = $id_facture;

        return $this;
    }
}