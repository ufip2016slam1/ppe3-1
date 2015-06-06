<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 06/06/15
 * Time: 11:35
 */

require_once 'Framework/Controleur.php';
require_once 'Modele/Facture.php';

class ControleurFacture extends Controleur
{

    public static $champsModifiable = array();

    public function index() {
        echo ('appel de la fonction index du ControleurCategorie');
    }

    public function add() {

    }

}