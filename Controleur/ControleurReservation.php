<?php
/**
*
* controleur de l'ojet reservation
* 	effectue toutes les actions suivantes :
*  		+ add() : ajoute une reservation
*    		- parametre @date_dbt, @date_fin, @nom_salle
*      	+ getReserv () : recupère toute les reservations (une periode ou un client peut être specifié)
*       	- parametre optionnel @debut, @fin
*       + modifierResevation () : modification d'une reservation
*       	- parametre @id_reservation, @date_dbt, @date_fin, @id_salle
*       + annulerReservation () : annulation d'une reservation
*       	- parametre @id_reservation
*
**/
require_once 'Framework/Controleur.php';
require_once 'Modele/Reservation.php';

class ControleurReservation extends Controleur
{
	public function index() {
		echo ('appel de la fonction index du ControleurReservation');
	}

	/**
	* si tout les parametres requis sont present :
	* 		instantiation d'un objet Reservation	
	**/	
	public function add() {	
		if ($this->requete->existeParametre(array('date_dbt', 'date_fin', 'nom_salle'))) {
			$reserv = new Reservation ();
			$reserv->setDate_dbt($requete->getParametre('date_dbt'));
			$reserv->setDate_fin($requete->getParametre('date_fin'));
			$reserv->setId_salle($this->getIdSalleByNom($requete->getParametre('nom_salle')));
			$reserv->setId_user($_SESSION['user']);
			return $reserv->add();
		}
		else {
			throw new Exception("Paramètres reservation incomplets");
		}
	}

	/**
	*
	* si aucun parametre -> recuperation de l'ensemble des reservation en base de donnée
	* sinon recuperation -> recuperation sur l'intervalle specifie grace a la fonction getAllPeriode()
	*
	**/
	public function getReserv() {
		if (!$this->requete->existeParametre(array('debut', 'fin'))) {
			return Reservation::getAll();
		}
		else {
			$debut = $this->requete->getParametre('debut');
			$fin = $this->requete->getParametre('fin');
			return Reservation::getByPeriode($dbt, $fin);
		}
	}

	/**
	*
	* il doit etre specifie id_reservation et (date_dbt ou date_fin ou id_salle)
	* si pas d'erreur sur ces parametres les modifications sont effectuer sur l'objet reservation
	* a l'aide de la boucle foreach pour s'adapter au nombre de parametre
	*
	**/
	public function modifierReservation() {
		if (!$this->requete->existeParametre('id_reservation'))
			throw new Exception("Aucune reservation precisée");
		if (!$this->requete->existeParametre('date_dbt') || !$this->requete->existeParametre('date_fin') || !$this->requete->existeParametre('id_salle'))
			throw new Exception("Acun parametre a modifier");

		$id = (int)$this->requete->getParametre('id_reservation');
		$champsModifiable = array('date_dbt', 'date_fin', 'id_salle');

		foreach ($champsModifiable as $value) {
			if ($this->requete->existeParametre($value)) {
				Reservation::update($value, $this->requete->getParametre($value), $id);
			}
		}	
	}

	/**
	*
	* si l'id_reservation est preciser 
	* MAJ du champs annulation de la table reservation a la date de l'action d'annulation
	*
	**/	
	public function annulerResevation() {
		if (!$this->requete->existeParametre('id_reservation'))
			throw new Exception("Aucune reservation precisée");
		$id = (int)$this->requete->getParametre('id_reservation');

		Reservation::update('date_annule', date("Y-m-d H:i:s"), $id);
	}

	/**
	*
	* retourne l'id d'un salle en fonction de son nom
	*
	**/	
	private function getIdSalleByNom ($nom) {
		Salle::getBy('nom_salle',$nom);
		return $salle->getId_salle();
	}
}