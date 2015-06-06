<?php
/**
*
* controleur de l'ojet user
* 	effectuer toutes les actions suivantes :
*  		+ add : ajoute un user
*    		- parametre @identifiant, @password, @mail
*      	+ supprimerUser : supprimer un user
*
**/
require_once 'Framework/Controleur.php';
require_once 'Framework/Session.php';
require_once 'Modele/User.php';

class ControleurUser extends Controleur
{
    public static $champsModifiable = array();

	public function index() {
		$this->genererVue();
	}

	/**
	* si tout les parametres requis sont present :
	* 		instantiation d'un objet user
	*  		setter sur chaque attribut d'un user
	*   	chiffrage sha1 du mot de passe
	*   	insertion en base de donnée
	* sinon exception
	**/	
	public function add() {	
		if ($this->requete->existeParametre(array('identifiant', 'password', 'mail'))) {
			$user = new User ();
			$user->setIdentifiant($this->requete->getParametre('identifiant'));
			$user->setPassword(sha1($this->requete->getParametre('password')));
			$user->setMail($this->requete->getParametre('mail'));
			$user->add();
		}
		else {
			throw new Exception("Paramètres utilisateur incomplets");
		}
	}


	/**
	*
	* regenere un mdp aleatoire
	*
	**/	
	public function nouveauMdp() {
		if ($this->requete->existeParametre('id')) {
			$user = User::getById($this->requete->getParametre('id'));
			$user->setPassword(sha1($this->genererMdp()));
		}
	}

    public function connexion() {
        if ($this->requete->existeParametre(array('email','password'))) {
            $user = User::getBy('mail', $this->requete->getParametre('email'));
            var_dump($user);
            if ($user->getPassword() === sha1($this->requete->getParametre('password'))) {
                session_start();
                $_SESSION[$user] = $user;
                /**
                 * appel de la vue principale affichage du calandrier
                 */
            }
            else {
                /**
                 * appel vue erreur mdp
                 */
                throw new Exception ('erreur mdp');
            }
        }
    }

	/**
	*
	* fonction privee qui genere un mot de passe de 10 caracteres
	*
	**/	
	private function genererMdp () {
		$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&é"\'(-è_çà),;:!?./§ù%*µ$£<>';
		$mdp = str_shuffle($caracteres);
		return substr($mdp, 0, 10);
	}
}