<?php

require_once 'Requete.php';
require_once 'Vue.php';

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @version 1.0
 */
abstract class Controleur {

    /** Action à réaliser */
    private $action;
    
    /** Requête entrante */
    protected $requete;

    /**
     * Définit la requête entrante
     * 
     * @param Requete $requete Requete entrante
     */
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     * 
     * @throws Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     * 
     * @param array $donneesVue Données nécessaires pour la génération de la vue
     */
    protected function genererVue($donneesVue = array())
    {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);
        
        // Instanciation et génération de la vueF
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }


    /**
    *
    * supprimme un element en fonction de son ID
    * s'adapte a chaque classe grace a la fonction get_class
    *
    **/
    protected function supprimmer() {
        $instance = substr(get_class($this),10);
        if ($this->requete->existeParametre('id_'.strtolower($instance))) {
            $id = (int)$this->requete->getParametre('id_'.strtolower($instance));
            $instance::delete($id);
        }
    }


    /**
     * modifier un element en fonction de son ID
     * fonction generique
     */
    protected function modifier() {
        $controleur = get_class($this);
        $instance = substr(get_class($this),10);
        $id = (int)$this->requete->getParametre('id_'.strtolower($instance));

        if ($this->requete->existeParametre('id_'.strtolower($instance))) {
            foreach ($controleur::$champsModifiable as $value) {
                if ($this->requete->existeParametre($value))
                    $instance::update($value, $this->requete->getParametre($value), $id);
			}
        }
    }

    /**
    *
    * Envoie un e-mail
    *
    * @param array $info Tableau contenant mail, sujet, message
    * @return bool $result Réussite de l'envoie du mail
    */
    private function envoiMail($info) {
        $headers = 'Content-type: text/html; charset=utf-8' . "\r\n"; // Pour utilisation HTML UTF-8
        $headers .= 'From: M2L <M2L@email.com>';
        $result = mail($info['mail'], $info['sujet'], $info['message'], $headers);
        return $result;
    }
}
