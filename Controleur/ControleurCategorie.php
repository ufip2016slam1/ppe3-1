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

    public function index() {
        // on recupere l'ensemble des parametre des categories
        $categories = Categorie::getAll();
        $tabCategories = array();
        foreach ($categories as $cat) {
            if ($cat != false){
                $salles = $cat->getSalle();
                $tabSalle = array();
                foreach ($salles as $salle){
                    if ($salle != false){
                        $tabSalle[] = $salle->getNom_salle();
                    }
                }
                $tabCategories[] = array(
                    'id' => $cat->getId_categorie(),
                    'nom' => $cat->getNom(),
                    'horaire_dbt' => $cat->getHoraire_dbt_reserv(),
                    'horaire_fin' => $cat->getHoraire_fin_reserv(),
                    'salles' => $tabSalle
                );
            }
        }
        // on genere la vue avec l'ensemble des categorie et leur details
        $this->genererVue(array('categories'=>$tabCategories));
    }

    // ajoute une categorie appeler en ajax
    public function add () {
        if ($this->requete->existeParametre(array('nom_categorie', 'horaire_dbt', 'horaire_fin'))) {
            $cat = new Categorie();
            $cat->setNom($this->requete->getParametre('nom_categorie'));
            $cat->setHoraire_dbt_reserv($this->requete->getParametre('horaire_dbt'));
            $cat->setHoraire_fin_reserv($this->requete->getParametre('horaire_fin'));
            $cat->add();
            echo 'OK';
        }
        else {
            echo 'nOK';
            //throw new Exception("Paramètres categorie incomplets");
        }
    }

    public function update() {
        // on test la presence du paramètre id sinon on sort de la fonction
        if (!$this->requete->existeParametre('id')){
            echo 'aucune categorie selectionner';
            return false;
        }
        if ($this->requete->existeParametre(array('nom_categorie', 'horaire_dbt', 'horaire_fin'))) {
            $cat = Categorie::getById($this->requete->getParametre('id'));

            if ($cat->getNom() != $this->requete->getParametre('nom_categorie'))
                Categorie::update('nom_catgeorie', 'test'/*$this->requete->getParametre('nom_catgegorie')*/, 1/*$cat->getId_categorie()*/);
            if ($cat->getHoraire_dbt_reserv() != $this->requete->getParametre('horaire_dbt'))
                Categorie::update('horaire_dbt_reserv', $this->requete->getParametre('horaire_dbt'), $cat->getId_categorie());
            if ($cat->getHoraire_fin_reserv() != $this->requete->getParametre('horaire_fin'))
                Categorie::update('horaire_fin_reserv', $this->requete->getParametre('horaire_fin'), $cat->getId_categorie());
        }
        echo 'OK';
    }
}