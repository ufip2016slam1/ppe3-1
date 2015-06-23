<?php
/**
*
* controleur de l'ojet user
* 	effectuer toutes les actions suivantes :
*  		+ add : ajoute un client
*    		- parametre @adresse, @code_postal, @ville, @telephone et (@nom, @prenom ou @raison_sociale)
*
**/
require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';

class ControleurClient extends Controleur
{

    public static $champsModifiable = array('nom', 'prenom', 'raison_sociale', 'adresse', 'code_postal', 'ville', 'telephone');

	public function index() {

        $clients = Client::getAll();
        $pClients = array();
        foreach ($clients as $client) {
            if ($client != false) {
                $pClients[] = array(
                    'id' => $client->getId_client(),
                    'nom' => $client->getNom(),
                    'prenom' => $client->getPrenom(),
                    'RS' => $client->getRaison_sociale(),
                    'adresse' => $client->getAdresse(),
                    'CP' => $client->getCodePostal(),
                    'ville' => $client->getVille(),
                    'tel' => $client->getTelephone(),
                    'mail' => 'attr absent modele'
                );
            }
        }

        $users = User::getAll();
        $tabUser = array();
        foreach ($users as $user) {
            if ($user != false) {
                $tabUser[] = array(
                    'identifiant' => $user->getIdentifiant(),
                    'mail' => $user->getMail(),
                    'id_user' => $user->getId_user()
                );
            }
        }
        $this->genererVue(array('clients' => $pClients, 'users' => $tabUser));
	}

    public function delete () {
        if ($this->requete->existeParametre('id')){
            $Ids = $this->requete->getParametre('id');
            foreach ($Ids as $id){
                Client::delete($id);
            }
            echo 'OK';
        }
        else
            echo 'Nok';
    }


	/**
	*
	* insatnce d'un nouveau client setter sur chaque attribut sauf 
	* 	raison_sociale ou nom et prenom selon le cas (personne morale ou physique)
	*
	**/
	public function add() {
		if ($this->requete->existeParametre('adresse', 'code_postal', 'ville', 'telephone')
            && ($this->requete->existeParametre(array('nom', 'prenom'))||$this->requete->existeParametre('raison_sociale'))) {
			$client = new Client();
			$client->setAdresse($this->requete->getParametre('adresse'));
			$client->setCodePostal($this->requete->getParametre('code_postal'));
			$client->setVille($this->requete->getParametre('ville'));
			$client->setTelephone($this->requete->getParametre('telephone'));

			if ($this->requete->existeParametre(array('nom', 'prenom'))) {
				$client->setNom($this->requete->getParametre('nom'));
				$client->setPrenom($this->requete->getParametre('prenom'));
			}
			if ($this->requete->existeParametre('raison_sociale')) {
				$client->setRaison_sociale($this->requete->getParametre('raison_sociale'));
			}

			$client->add();
		}
		else {
			//throw new Exception("Paramètres client incomplets");
            echo ('nOK');
		}
        echo ('OK');
	}

    /**
     * appeler en ajax
     * realise la mise a jour d'un client
     */
    public function update() {
        // on test la presence du paramètre id sinon on sort de la fonction
        if (!$this->requete->existeParametre('id')){
            echo 'aucun utilisateur selectionner';
            return false;
        }
        if ($this->requete->existeParametre('adresse', 'code_postal', 'ville', 'telephone')
            && ($this->requete->existeParametre(array('nom', 'prenom'))||$this->requete->existeParametre('raison_sociale'))) {
            $client = Client::getById($this->requete->getParametre('id'));

            if ($client->getAdresse() != $this->requete->getParametre('adresse'))
                Client::update('adresse', $this->requete->getParametre('adresse'), $client->getgetId_client());

            if ($client->getCodePostal() != $this->requete->getParametre('code_postal'))
                Client::update('code_postal', $this->requete->getParametre('code_postal'), $client->getgetId_client());

            if ($client->getVille() != $this->requete->getParametre('ville'))
                Client::update('ville', $this->requete->getParametre('ville'), $client->getgetId_client());

            if ($client->getTelephone() != $this->requete->getParametre('telephone'))
                Client::update('telephone', $this->requete->getParametre('telephone'), $client->getgetId_client());
        }
        echo 'OK';
    }

}