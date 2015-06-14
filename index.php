<?php

if (!isset($_SESSION['auth'])){
    $_SESSION['auth'] = 0;
}
// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

require 'Framework/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();


