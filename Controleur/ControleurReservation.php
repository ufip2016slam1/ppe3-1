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
require_once 'Modele/Salle.php';

class ControleurReservation extends Controleur
{

    public static $champsModifiable = array('date_dbt', 'date_fin', 'id_salle');

	public function index() {
		
		$this->genererVue();

	}

	/**
	* si tout les parametres requis sont present :
	* 		instantiation d'un objet Reservation	
	**/	
	public function add() {	
		echo 'OK' ;
		if ($this->requete->existeParametre(array('date_dbt', 'date_fin', 'nom_salle'))) {
			$reserv = new Reservation ();

			//$reserv->setDate_dbt($requete->getParametre('date_dbt'));
			$reserv->setDate_dbt('2015-06-17 09:00:00');
			//$reserv->setDate_fin($requete->getParametre('date_fin'));
			$reserv->setDate_fin('2015-06-17 10:00:00');

			//$reserv->setId_salle($this->getIdSalleByNom($requete->getParametre('nom_salle')));

			$reserv->setId_salle('1');
			$reserv->setId_client('54');

			//$reserv->setId_client($requete->getParametre('date_dbt'));

			//$reserv->setId_user($_SESSION['user']->getId_user());
			$reserv->setId_user('5');
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
			return Reservation::getByPeriode($debut, $fin);
		}
	}

    public function ajaxGetReserv() {
        $tabReserv = Reservation::getAll();
        $json = array();

        foreach ($tabReserv as $reservation) {
            $json[] = array(
                "id" => $reservation->getId_reservation(),
                "title" => $reservation->getSalle()->getNom_salle(),
                "start" => $reservation->getDate_dbt(),
                "end" => $reservation->getDate_fin(),
                "allDay" => false
            );
        }
        echo json_encode($json);
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

}