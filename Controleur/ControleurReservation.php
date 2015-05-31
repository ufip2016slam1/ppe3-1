<?php
/**
*
* controleur de l'ojet reservation
* 	effectu toutes les actions suivantes :
*  		+ add() : ajoute une reservation
*    		- parametre $_POST date_dbt, date_fin, nom_salle
*
**/
require_once 'Framework/Controleur.php';
require_once 'Modele/Reservation.php';

class ControleurReservation extends Controleur
{
	public function index() {
		echo ('appel de la foncion index du ControleurUser');
	}

	/**
	* si tout les parametres requis sont present :
	* 		instantiation d'un objet Reservation	*  		
	**/	
	public function add() {	
		if ($this->requete->existeParametre(array('date_dbt', 'date_fin', 'nom_salle'))) {
			$reserv = new Reservation ();
			$reserv->setDate_dbt($requete->getParametre('date_dbt'));
			$reserv->setDate_fin($requete->getParametre('date_fin'));
			$reserv->setId_salle($this->getIdSalleByNom($requete->getParametre('nom_salle')));
			$reserv->setId_user($_SESSION['user']);
			$reserv->add();
		}
		else {
			throw new Exception("Paramètres utilisateur incomplets");
		}
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