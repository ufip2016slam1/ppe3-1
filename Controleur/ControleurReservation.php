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
require_once 'Modele/Client.php';
require_once 'Modele/User.php';

class ControleurReservation extends Controleur
{

    public static $champsModifiable = array('date_dbt', 'date_fin', 'id_salle');

	public function index() {

		$salles = Salle::getAll();
        $pSalles = array();


        /**
        *
        * Recuperation de toutes les salles disponibles 
        *
        **/
        foreach ($salles as $salle) {
            if ($salle != false) {
                $pSalles[] = array(
                    'nom_salle' => $salle-> getNom_salle()
                );
            }
        }

		$userConnecte = User::getById($_SESSION['id_user']);
		$clients = $userConnecte->getClient();

		$pClients = array();

		if(is_array($clients))
			foreach ($clients as $client) {
				if ($client != false){
					$pClients[] = array(
						'id' => $client->getId_client(),
						'nom' => $client->getNom()
					);
				}
			}
		elseif (!empty($clients))
			$pClients[] = array(
				'id' => $clients->getId_client(),
				'nom' => $clients->getNom());

        $this->genererVue(array('salles' => $pSalles, 'clients' => $pClients));

	}

	/**
	* si tout les parametres requis sont present :
	* 		instantiation d'un objet Reservation	
	**/	
	public function add() {	

		if ($this->requete->existeParametre(array('date_dbt', 'date_fin', 'nom_salle', 'id_client'))) {

			$reserv = new Reservation ();

			$reserv->setDate_dbt($this->requete->getParametre('date_dbt'));
			$reserv->setDate_fin($this->requete->getParametre('date_fin'));
			$reserv->setId_salle(Salle::getBy('nom_salle',$this->requete->getParametre('nom_salle')));
			$reserv->setDate_reserv(date('o-m-d G:i:s'));
			$reserv->setId_client(Client::getById($this->requete->getParametre('id_client')));
			$reserv->setId_user(User::getById($_SESSION['id_user']));
			
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
        $tabReserv = Reservation::ajaxGetAll();

        $tabReserv = array_splice($tabReserv,0,-1);

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