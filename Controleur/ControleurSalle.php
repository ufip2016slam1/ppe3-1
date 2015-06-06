<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 06/06/15
 * Time: 11:32
 */

require_once 'Framework/Controleur.php';
require_once 'Modele/Salle.php';

class ControleurSalle extends Controleur
{

    public static $champsModifiable = array();

    public function index() {
        echo ('appel de la fonction index du ControleurSalle');
    }

    public function add() {
        if ($this->requete->existeParametre(array('nom_salle', 't1', 't2', 't3'))) {
            $salle = new Salle;
            $salle->setNom_salle($this->requete->getParametre('nom_salle'));
            $salle->setTarif(array($this->requete->getParametre('t1'),$this->requete->getParametre('t2'),$this->requete->getParametre('t3')));
            $salle->add();
        }
    }
}