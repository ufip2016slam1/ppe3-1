<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 06/06/15
 * Time: 11:34
 */

require_once 'Framework/Controleur.php';
require_once 'Modele/Categorie.php';

class ControleurCategorie extends Controleur
{

    public static $champsModifiable = array();

    public function index() {
        echo ('appel de la fonction index du ControleurCategorie');
    }

    public function add () {
        if ($this->requete->existeParametre(array('nom_categorie', 'horaire_dbt_reserv', 'horaire_fin_reserv'))) {
            $cat = new Categorie();
            $cat->setNom($this->requete->getParametre('nom_categorie'));
            $cat->setHoraire_dbt_reserv($this->requete->getParametre('horaire_dbt_reserv'));
            $cat->setHoraire_fin_reserv($this->requete->getParametre('horaire_fin_reserv'));
            $cat->add();
        }
        else {
            throw new Exception("Paramètres categorie incomplets");
        }
    }
}