<?php
/**
*
* controleur de l'ojet user
* 	effectuer toutes les actions suivantes :
*  		+ add : ajoute un user
*    		- parametre $_POST -> identifiant, password, mail
*
**/
require_once 'Framework/Controleur.php';
require_once 'Framework/Session.php';
require_once 'Modele/User.php';

class ControleurUser extends Controleur
{
	public function index() {
		echo ('appel de la foncion index du ControleurUser');
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
}