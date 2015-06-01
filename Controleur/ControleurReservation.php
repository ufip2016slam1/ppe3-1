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
		echo ('appel de la fonction index du ControleurUser');
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
			throw new Exception("Paramètres utilisateur incomplets");
		}
	}

	/**
	*
	* si aucun parametre -> recuperation de l'ensemble des reservation en base de donnée
	* sinon recuperation -> recuperation sur l'intervalle specifie grace a la fonction getAllPeriode()
	*
	**/
	public function getReserv() {
		$reverv = new Reservation();
		if ($this->requete->existeParametre(array('debut', 'fin'))) {
			$debut = $this->requete->getParametre('debut');
			$fin = $this->requete->getParametre('fin');
			return $reserv->getAllPeriode($debut, $fin);
		}
		else {
			return $reserv->getAll();
		}
	}

	/**
	*
	* il doit etre specifie id_reservation et (date_dbt ou date_fin ou id_salle)
	* si pas d'erreur sur ces parametres les modifications sont effectuer sur l'objet reservation
	* a l'aide de la boucle foreach pour s'adapter au nombre de parmetre
	*
	**/
	
	public function modifierReservation() {
		if (!$this->requete->existeParametre('id_reservation'))
			throw new Exception("Aucune reservation precisée");
		if (!$this->requete->existeParametre('date_dbt') || !$this->requete->existeParametre('date_fin') || !$this->requete->existeParametre('id_salle'))
			throw new Exception("Acun parametre a modifier");

		$id = $this->requete->getParametre('id_reservation');
		$reservation = new Reservation();
		$revervation->getById($id);	

		foreach ($this->requete->parametre as $key => $value) {
			if ($key == 'date_dbt' || $key == 'date_fin' || $key == 'id_salle') {
				$reservation->update($key, $value, $id);
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

		$reservation = new Reservation();
		$reservation->update('date_annule', date("Y-m-d H:i:s"), $id);
	}

	/**
	*
	* retourne l'id d'un salle en fonction de son nom
	*
	**/	
	private function getIdSalleByNom ($nom) {
		$salle = new Salle ();
		$salle->getBy('nom_salle',$nom);
		return $salle->getId_salle();
	}
}