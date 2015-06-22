<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 06/06/15
 * Time: 11:32
 */

require_once 'Framework/Controleur.php';
require_once 'Modele/Salle.php';
require_once 'Modele/Categorie.php';

class ControleurSalle extends Controleur
{

    public static $champsModifiable = array();

    public function index() {
        // on recupere l'ensemble des noms de categories
        $categories = Categorie::getAll();
        $tabCategories = array();
        foreach ($categories as $cat) {
            if ($cat != false)
                $tabCategories[] = $cat->getNom();
        }

        //on recupere l'ensemble des salles avec leurs attributs
        $salles = Salle::getAll();
        $tabSalles = array();
        foreach ($salles as $salle) {
            if ($salle != false) {
                $tabSalles[] = array(
                    'nom' => $salle->getNom_salle(),
                    't1' => $salle->getTarif1(),
                    't2' => $salle->getTarif2(),
                    't3' => $salle->getTarif3(),
                    'categorie' => $salle->getCategorie()->getNom()
                );
            }
        }

        // on genere la vue avec :
        //      le tableau des noms de categorie
        //      le tableau contenant le detail de des salle
        $this->genererVue(array('categories' => $tabCategories, 'salles' => $tabSalles));
    }

    /**
     *  appeler en ajax lors de la creation d'une salle
     *  instancie un objet salle
     *  recupere l'id de la categorie par rapport a son nom
     */
    public function add() {
        if ($this->requete->existeParametre(array('nom_salle', 't1', 't2', 't3', 'categorie'))) {
            $salle = new Salle;
            $salle->setNom_salle($this->requete->getParametre('nom_salle'));
            $salle->setTarif1($this->requete->getParametre('t1'));
            $salle->setTarif2($this->requete->getParametre('t2'));
            $salle->setTarif3($this->requete->getParametre('t3'));
            $salle->setId_categorie(Categorie::getBy('nom_categorie', $this->requete->getParametre('categorie')));
            $salle->add();
        }
    }
}