<?php

/*
 * Classe modélisant une requête HTTP entrante
 * 
 * @version 1.0
 */
class Requete {

    /** Tableau des paramètres de la requête */
    private $parametres;

    /**
     * Constructeur
     * 
     * @param array $parametres Paramètres de la requête
     */
    public function __construct($parametres) {
        $this->parametres = $parametres;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     * Ajout fonctionnalité : 
     *     si le parametre est un tableau la fonction check la presence de chaque parametre du tableau en entré
     *     sinon elle test le parametre simple dans le else
     * 
     * @param string $nom Nom du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide 
     */
    public function existeParametre($nom) {
        if (is_array($nom)) {
            foreach ($nom as $n) {
                if (!(isset($this->parametres[$n]) && $this->parametres[$n] != ""))
                    return false;
            }
            return true;
        }
        else 
            return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     * 
     * @param string $nom Nom d paramètre
     * @return string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else {
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

