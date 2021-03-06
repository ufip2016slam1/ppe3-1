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
		if ($this->requete->existeParametre(array('identifiant', 'mail', 'password'))) {
            $identifiant = $this->requete->getParametre('identifiant');
            $mail = $this->requete->getParametre('mail');
            $password = sha1($this->requete->getParametre('password'));

            if ($this->verifierExisteUser($identifiant, $mail)) {
                var_dump('identifiant ou mail deja existant');
                $this->genererVue();
            }
            else {
                $user = new User ();
                $user->setIdentifiant($identifiant);
                $user->setMail($mail);
                $user->setPassword($password);
                $user->add();

                /*mail($this->requete->getParametre('mail'),'inscription MLL', "identifiant : ".
                    $this->requete->getParametre('identifiant')."<br />".
                    "mot de passe : ".$pass);*/
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

                $_SESSION['id_user'] = $user->getId_user();
                $_SESSION['user'] = $user;
                $_SESSION['auth'] = 1;
                $_SESSION['client'] = $user->getClient();

                //$this->genererVue();
                header('location:index.php?controleur=reservation&action=index');
                /**
                 * appel de la vue principale affichage du calendrier
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

    public function deconnexion() {
        session_destroy();
        header('location:index.php');
    }

    public function affichage(){
        $users = User::getAll();
        $tabUser = array();
        foreach ($users as $user) {
            if ($user != false) {
                $clients = $user->getClient();
                $tabClient = array();
                if ($clients != false){
                    foreach ($clients as $client){
                        if ($client != false) {
                            $tabClient[] = $client->getNom();
                        }
                    }
                }

                $tabUser[] = array(
                    'admin' => $user->getAdmin(),
                    'identifiant' => $user->getIdentifiant(),
                    'id_user' => $user->getId_user(),
                    'clients' => $tabClient
                );
            }
        }
        $this->genererVue(array('users' => $tabUser));
    }

    public function update () {
        // on test la presence du paramètre id sinon on sort de la fonction
        if (!$this->requete->existeParametre('id')){
            echo 'aucune categorie selectionner';
            return false;
        }

        $user = User::getById($this->requete->getParametre('id'));
        $info = array(
            'mail' => $user->getMail(),
            'sujet' => 'reinitialisation mot de passe',
            'message' => 'votre nouveau mot de passe : '.$this->genererMdp(10)
        );
        $this->envoiMail($info);
        echo 'OK';
    }

    public function ajaxAdmin () {

        if ($this->requete->existeParametre(array('id_user', 'admin'))){
            $retour = User::update('admin', (boolean)$this->requete->getParametre('admin'), $this->requete->getParametre('id_user'));
            echo $retour;
            die();
        }
    }
}