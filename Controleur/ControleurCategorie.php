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
        // on recupere l'ensemble des parametre des categories
        $categories = Categorie::getAll();
        $tabCategories = array();
        foreach ($categories as $cat) {
            if ($cat != false){
                $tabCategories[] = array(
                    'id' => $cat->getId_categorie(),
                    'nom' => $cat->getNom(),
                    'horaire_dbt' => $cat->getHoraire_dbt_reserv(),
                    'horaire_fin' => $cat->getHoraire_fin_reserv(),
                );
            }
        }
        // on genere la vue avec l'ensemble des categorie et leur details
        $this->genererVue(array('categories'=>$tabCategories));
    }

    // ajoute une categorie appeler en ajax
    public function add () {
        if ($this->requete->existeParametre(array('nom_categorie', 'horaire_dbt_reserv', 'horaire_fin_reserv'))) {
            $cat = new Categorie();
            $cat->setNom($this->requete->getParametre('nom_categorie'));
            $cat->setHoraire_dbt_reserv($this->requete->getParametre('horaire_dbt_reserv'));
            $cat->setHoraire_fin_reserv($this->requete->getParametre('horaire_fin_reserv'));
            $cat->add();
            echo 'OK';
        }
        else {
            echo 'nOK';
            //throw new Exception("Paramètres categorie incomplets");
        }
    }
}