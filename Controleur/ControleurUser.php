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

/**
 * Class ControleurUser
 */
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
	public function register() {
		if ($this->requete->existeParametre(array('identifiant', 'mail'))) {
            $identifiant = $this->requete->getParametre('identifiant');
            $mail = $this->requete->getParametre('mail');

            if ($this->verifierExisteUser($identifiant, $mail)) {
                var_dump('identifiant ou mail deja existant');
                $this->genererVue();
            }
            else {
                $user = new User ();
                $user->setIdentifiant($identifiant);
                $user->setMail($mail);
                $user->setPassword(sha1($pass = $this->genererMdp(10)));
                $user->add();

                /*mail($this->requete->getParametre('mail'),'inscription MLL', "identifiant : ".
                    $this->requete->getParametre('identifiant')."<br />".
                    "mot de passe : ".$pass);*/

                header('location:index.php');
                exit;
            }
		}
		else {
            $this->genererVue();
		}
	}

    /**
     * @throws Exception
     */
    public function connexion() {
        if ($this->requete->existeParametre(array('email','password'))) {
            $user = User::getBy('mail', $this->requete->getParametre('email'));
            if ($user->getPassword() === sha1($this->requete->getParametre('password'))) {
                $_SESSION['user'] = $user;
                $_SESSION['auth'] = 1;
                $this->genererVue();
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

    public function nouveauMdp() {
        if ($this->requete->existeParametre('mail')){
            $mail = $this->requete->getParametre('mail');
            $user = User::getBy('mail', $mail);
            $pass = $this->genererMdp(10);
            mail($mail, "reinit mot de passe", "votre nouveau mot de pass".$pass);
            $user->setPassword('$pass');
            header('location:index.php');
            exit;
        }
        else {
            $this->genererVue();
        }
    }


    /**
     * genere un mot de passe aléatoire de 20 lettre max
     * @param $taille
     * @return string
     */
    private function genererMdp ($taille) {
        if($taille > 20)
            $taille = 20;
		$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&é"\'(-è_çà),;:!?./§ù%*µ$£<>';
		$mdp = str_shuffle($caracteres);
		return substr($mdp, 0, $taille);
	}


    /**
     * verifie l'existance d'un user
     * @param $id : identifiant
     * @param $mail : email
     * @return bool : vrai si l'identifiant ou le mail existe
     */
    private function verifierExisteUser ($id = null, $mail = null) {
        if ( (bool)User::getBy('identifiant', $id) || (bool)User::getBy('mail', $mail) ){
            var_dump(User::getBy('identifiant', $id));
            return true;
        }
        return false;
    }
	
	/**
	*
	* Fonction mail($@mail, $sujet, $message, $headers); headers non obligatoire
	* Si le message dépasse 70 caracétres utilisé $message = wordwrap($message, 70, "\r\n"); 
	* Message en HTML possible
	*/
	private function envoiMail() {
		// Message en utilisant HTML UTF-8
		$message ='
			<html>
			<head>
    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    		<title>Validation d\'inscription M2L</title>
			</head>
			<body>
   			<p>Bonjour,'.$user->getIdentifiant().',<br />
   				<br />
   				Pour valider votre compte veillez clické sur le lien ci-dessous :<br />
   				<a href=""#">Validation du compte</a>
   			</p>
   			</body>
			</html>
		'; 
		// Fin message
		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n"; // Pour utilisation HTML UTF-8
		$headers .= 'From: M2L <M2L@email.com>';
		mail($user->getMail(), 'Validation compte M2L', $message, $headers);
 	}
	/*
	*	// Message simple
	*	$message = 'Bonjour '.$user->getIdentifiant().',\r\n
	*			Afin de valider l'inscription au systéme de réservation de la M2L veillez vous dirigez vers ce lien :\r\n
	*			...';
	*	if($message.length >= 70)
	*			$message = wordwrap($message, 70, "\r\n");
	*
	**/
}