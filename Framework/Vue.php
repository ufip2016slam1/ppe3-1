<?php

require_once 'Configuration.php';

/**
 * Classe modélisant une vue
 *
 * @version 1.0
 */
class Vue {

    /** Nom du fichier associé à la vue */
    private $fichier;

    /** Titre de la vue (défini dans le fichier vue) */
    private $titre;

    private $addCSS = null;
    private $addJS = null;

    /**
     * Constructeur
     * 
     * @param string $action Action à laquelle la vue est associée
     * @param string $controleur Nom du contrôleur auquel la vue est associée
     */
    public function __construct($action, $controleur = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        // La convention de nommage des fichiers vues est : Vue/<$controleur>/<$action>.php
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    /**
     * Génère et affiche la vue
     * 
     * @param array $donnees Données nécessaires à la génération de la vue
     */
    public function generer($donnees) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $racineWeb = Configuration::get("racineWeb", "/");

        $fichierInclus = array(
            'titre' => $this->titre,
            'contenu' => $contenu,
            'racineWeb' => $racineWeb
        );
        if (!is_null($this->addCSS))
            $fichierInclus['addCSS'] = $this->addCSS;
        if (!is_null($this->addJS))
            $fichierInclus['addJS'] = $this->addJS;
        // Génération du gabarit commun utilisant la partie spécifique
        if ($_SESSION['auth'] === 1) {
            $fichierInclus['userAdmin'] = User::getById($_SESSION['id_user'])->getAdmin();
            $fichierInclus['username'] = User::getById($_SESSION['id_user'])->getIdentifiant();
            $vue = $this->genererFichier('Vue/gabarit3.php',$fichierInclus);
        }
        else {
            $vue = $this->genererFichier('Vue/gabaritConnexion.php',
                array('titre' => $this->titre, 'contenu' => $contenu,
                    'racineWeb' => $racineWeb));
        }

        // Renvoi de la vue générée au navigateur
        echo $vue;
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     * 
     * @param string $fichier Chemin du fichier vue à générer
     * @param array $donnees Données nécessaires à la génération de la vue
     * @return string Résultat de la génération de la vue
     * @throws Exception Si le fichier vue est introuvable
     */
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

    /**
     * Nettoie une valeur insérée dans une page HTML
     * Permet d'éviter les problèmes d'exécution de code indésirable (XSS) dans les vues générées
     * 
     * @param string $valeur Valeur à nettoyer
     * @return string Valeur nettoyée
     */
    private function nettoyer($valeur) {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * retourne le lien en tenant compte de l'activation de la reecriture url parametrer dans le fichier configuration
     * action par defaut index
     * page page par defaut si pas de parametre index.php
     * @param $controleur
     * @param $action
     * @return string
     */
    protected function lien ($controleur = null, $action = 'index'){
        $rewrite = Configuration::get('rewrite_url',false);
        if ($controleur != null) {
            if ($rewrite)
                echo $controleur . '/' . $action;
            else
                echo '?controleur=' . $controleur . '&action=' . $action;
        }
        else
            echo 'index.php';
    }

}
