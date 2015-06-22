<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 06/06/15
 * Time: 11:35
 */

require_once 'Framework/Controleur.php';
require_once 'Modele/Facture.php';
require_once 'Contenu/facturation/PDFFacture.php';

class ControleurFacture extends Controleur
{

    public static $champsModifiable = array();

    public function index() {
        echo ('appel de la fonction index du ControleurCategorie');
    }

    public function genereFacture($mois, $annee, $PClient) {
        $client = Client::getBy('nom', $PClient);
        $calcMois = $mois - date('m');
        $dateDbt = $annee.'-'.$mois.'-01 00:00:00';
        $dateFin = date('Y-m-d',(strtotime('last day of '.$calcMois.' month'))).' 23:59:59';
        $reserv = Reservation::getPeriodeBy($dateDbt, $dateFin, 'id_client', $client->getId_client());
        foreach($reserv as $value) {
            // Tarif a utilisé
            if(is_null($client->getRaison_sociale)) {
                $tarif = Salle::getById($value->getId_salle())->getTarif3(); // privé
            }
            else {
                if($client->getRaison_sociale() == 'Ligue') {
                    $tarif = Salle::getById($value->getId_salle())->getTarif1(); // ligue
                }
                else {
                    $tarif = Salle::getById($value->getId_salle())->getTarif2(); // club
                }
            }
            // Calcule du prix
            $interval = date_diff($value->getDate_dbt(), $value->getDate_fin());
            $heure = $interval->format('%h');
            $minute = $interval->format('%i')/60;
            $prix = ($heure + $minute) * $tarif;
            // Création du tableau
            $data[] = array(
                Salle::getById($value->getId_salle())->getNom_salle(),
                $value->getDate_dbt,
                $value->getDate_fin,
                $tarif,
                $prix,
        }
        // Instanciation de la classe dérivée
        $pdf = new PDFFacture();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $header = array('Salle', 'Date/heure début', 'Date/Heure fin', 'tarif(1h)', 'Prix');
        $pdf->BasicTable($header, $data); // $data -> tableau de tableau
        $pdf->Output();
    }

}