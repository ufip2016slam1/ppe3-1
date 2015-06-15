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
     * Exécute une requête SQL
     *
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected static function executerRequete($sql, $params = null) {
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

    public static function getAll ()
    {
        $sql = 'SELECT * FROM '.strtolower(get_called_class());
        $retour = self::executerRequete($sql);

        while ($sortie [] = $retour->fetchObject(strtolower(get_called_class())));
        //$sortie = array_slice($sortie, 0, -1); // on enleve la derniere case du tableau false pour utiliser des boucles foreach

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
        $sql = 'INSERT INTO '.strtolower(get_called_class()).'('.implode(', ', array_keys($tableau))
            .') values(\''.implode('\', \'', $tableau).'\')'; // la requête SQL
        $result = self::executerRequete($sql);
        $retour = $result->rowCount(); // nombre de ligne retourné
        if($retour == 0)
            return false;
        else
            return true; // return TRUE si réussi sinon FALSE
    }

    /**
    *
    * Fonction getById retoune un element en fonction de son ID
    *
    * @param entier pId ID de l'element
    * @return Objet Resultat de la requete
    **/

    public static function getById($pId) {
        $sql = 'SELECT * FROM '.strtolower(get_called_class()).' WHERE id_'.strtolower(get_called_class()).' = :id';
        $retour = self::executerRequete($sql, array(
            'id' => $pId,
        ));
        $result = $retour->fetchObject(strtolower(get_called_class()));
        return $result;
    }

    /**
    *
    * Fonction getBy retoune un element en fonction d'une valeur
    *
    * @param string colonne Nom de la colonne ou effectuer les changements
    * @param string valeur Valeur des elements a sélectionner
    * @return Objet Resultat de la requete
    **/

    public static function getBy($colonne, $valeur) {
        $sql = 'SELECT * FROM '.strtolower(get_called_class()).' WHERE '.$colonne.' = :valeur';
        $retour = self::executerRequete($sql, array('valeur' => $valeur,));
        while ($sortie [] = $retour->fetchObject(strtolower(get_called_class())));
        if (sizeof($sortie) <= 2)
            return $sortie[0];
        return $sortie;
    }

    /**
    *
    * Fonction delete Supprime un element de la BDD
    *
    * @param entier pId ID de l'element
    * @return Bool Reussite de la requete
    **/

    public static function delete($pId) {
        // DELETE FROM table WHERE condition
        $sql = 'DELETE from '.strtolower(get_called_class()).' WHERE id_'.strtolower(get_called_class()).' = :id';
        $result = self::executerRequete($sql, array('id' => $pId,));
        $retour = $result->rowCount(); // nombre de ligne retourné
        if($retour == 0)
            return false;
        else
            return true; // return TRUE si réussi sinon FALSE
    }

    /**
    *
    * Fonction update Modifie la valeur d'un element
    *
    * @param string colonne Nom de la colonne ou effectuer les changements
    * @param string valeur La valeur qui remplaceras la précédente
    * @param entier pId ID de l'element
    * @return Bool Reussite de la requete
    **/

    public static function update($colonne, $valeur, $pId) {
        // UPDATE table SET nom_colonne_1 = 'nouvelle valeur' WHERE condition
        $sql = 'UPDATE '.strtolower(get_called_class()).' SET '.$colonne.'= \''.$valeur.
        '\' WHERE id_'.strtolower(get_called_class()).' = :id';
        $result = self::executerRequete($sql, array('id' => $pId));
        $retour = $result->rowCount(); // nombre de ligne retourné
        if($retour == 0)
            return false;
        else
            return true; // return TRUE si réussi sinon FALSE
    }
}