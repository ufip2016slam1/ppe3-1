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
                    'id' => $salle-> getId_salle(),
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
            echo 'OK';
        }
    }

    public function update() {
        // on test la presence du paramètre id sinon on sort de la fonction
        if (!$this->requete->existeParametre('id')){
            echo 'aucune salle selectionner';
            return false;
        }
        if ($this->requete->existeParametre(array('nom_salle', 't1', 't2', 't3', 'categorie'))) {
            $salle = Salle::getById($this->requete->getParametre('id'));

            if ($salle->getNom_salle() != $this->requete->getParametre('nom_salle'))
                Salle::update('nom_salle', $this->requete->getParametre('nom_salle'), $salle->getId_salle());
            if ($salle->getTarif1() != $this->requete->getParametre('t1'))
                Salle::update('tarif1', $this->requete->getParametre('t1'), $salle->getId_salle());
            if ($salle->getTarif2() != $this->requete->getParametre('t2'))
                Salle::update('tarif2', $this->requete->getParametre('t2'), $salle->getId_salle());
            if ($salle->getTarif3() != $this->requete->getParametre('t3'))
                Salle::update('tarif3', $this->requete->getParametre('t3'), $salle->getId_salle());
            if ($salle->getCategorie()->getNom() != $this->requete->getParametre('categorie'))
                Salle::update('id_categorie', Categorie::getBy('nom_categorie', $this->requete->getParametre('categorie'))->getId_categorie(), $salle->getId_salle());
            echo 'ok';
        }
    }
}