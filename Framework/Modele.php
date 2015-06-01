<?php

/**
*
* Liste des fonctions disponible dans cet classe
*       getAll() : Objet;
*       add(Array) : Bool;
*       getById(Int) : Objet;
*       getBy(String, String) : Objet;
*       delete(Int) : Bool;
*       update(String, String, Int) : Bool;
*
**/

require_once 'Configuration.php';

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO de PHP
 *
 */
abstract class Modele {

    /** Objet PDO d'accès à la BD 
        Statique donc partagé par toutes les instances des classes dérivées */
    private static $bdd;

     /**
    * l'attribut _table doit être redefini dans les classes filles 
    **/
    protected $_table;

    /**
     * Exécute une requête SQL
     * 
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = self::getBdd()->query($sql);   // exécution directe
        }
        else {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * 
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getBdd() {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

    /**
    *
    * La fonction getAll renvoie tout les elements d'une table de la BDD
    * 
    * @return Objet Resultat de la requête
    *
    **/

    public function getAll ()
    {
        $sql = 'SELECT * FROM '.$this->_table;
        $retour = $this->executerRequete($sql);

        while ($sortie [] = $retour->fetchObject($this->_table));

        return $sortie;
    }

    /**
    *
    * Fonction pour l'ajout dans la base de données
    *
    * @param array tableau Tableau des données du formulaire
    * @return Bool Réussite de la requête
    **/
    
    // 
    protected function add($tableau = Null) {
        /* 
        * implode(', ', $table) -> transforme le tableau $table en chaine de 
        * caractére dont chaque valeur est séparé par la chaine ', '
        *
        * INSERT INTO table(champs) VALUES(valeurs)
        */
        $sql = 'INSERT INTO '.$this->_table.'('.implode(', ', array_keys($tableau))
            .') values(\''.implode('\', \'', $tableau).'\')'; // la requête SQL
        $result = $this->executerRequete($sql);
        //$retour = $result->fetch(PDO::FETCH_BOUND); // return TRUE si réussi sinon FALSE
        return $retour;
    }

    /**
    *
    * Fonction getById retoune un element en fonction de son ID
    *
    * @param entier pId ID de l'element
    * @return Objet Resultat de la requete
    **/
    
    public function getById($pId) {
        $sql = 'SELECT * FROM '.$this->_table.' WHERE id_'.$this->_table.' = :id';
        $retour = $this->executerRequete($sql, array(
            'id' => $pId,
        ));
        $sortie = $retour->fetchObject($this->_table);
        return $sortie;
    }

    /**
    *
    * Fonction getBy retoune un element en fonction d'une valeur
    *
    * @param string colonne Nom de la colonne ou effectuer les changements
    * @param string valeur Valeur des elements a sélectionner
    * @return Objet Resultat de la requete
    **/
    
    public function getBy($colonne, $valeur) {
        $sql = 'SELECT * FROM '.$this->_table.' WHERE '.$colonne.' = :valeur';
        $retour = $this->executerRequete($sql, array('valeur' => $valeur,));
        while ($sortie [] = $retour->fetchObject($this->_table));
        return $sortie;
    }

    /**
    *
    * Fonction delete supprime un element de la BDD
    *
    * @param entier pId ID de l'element
    * @return Bool Reussite de la requete
    **/
    
    public function delete($pId) {
        // DELETE FROM table WHERE condition
        $sql = 'DELETE from '.$this->_table.' WHERE id_'.$this->_table.' = :id';
        $result = $this->executerRequete($sql, array('id' => $pId,)); 
        //$retour = $result->fetch(PDO::FETCH_BOUND); // return TRUE si réussi sinon FALSE
        return $result;
    }

    /**
    *
    * Fonction update modifie la valeur d'un element
    *
    * @param string colonne Nom de la colonne ou effectuer les changements
    * @param string valeur La valeur qui remplaceras la précédente
    * @param entier pId ID de l'element
    * @return Bool Reussite de la requete
    **/
    
    public function update($colonne, $valeur, $pId) {
        // UPDATE table SET nom_colonne_1 = 'nouvelle valeur' WHERE condition
        $sql = 'UPDATE '.$this->_table.' SET '.$colonne.'= \''.$valeur.
        '\' WHERE id_'.$this->_table.' = :id';
        $result = $this->executerRequete($sql, array('id' => $pId)); 
        $retour = $result->fetch(PDO::FETCH_BOUND); // return TRUE si réussi sinon FALSE
        return $retour;    
    }
}