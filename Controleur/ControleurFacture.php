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

        $userConnecte = User::getById($_SESSION['id_user']);
        $clients = $userConnecte->getClient();

        $pClients = array();

        if(is_array($clients))
            foreach ($clients as $client) {
                if ($client != false){
                    $pClients[] = array(
                        'id' => $client->getId_client(),
                        'nom' => $client->getNom()
                    );
                }
            }
        elseif (!empty($clients))
            $pClients[] = array(
                'id' => $clients->getId_client(),
                'nom' => $clients->getNom());

        $this->genererVue(array('clients' => $pClients));
    }

    public function genereFacture() {
        if(!$this->requete->existeParametre(array('mois', 'annee', 'client')))
            return false;
        /* init des variables */
        $mois = $this->requete->getParametre('mois');
        $annee = $this->requete->getParametre('annee');
        $PClient = $this->requete->getParametre('client');
        /* ----------- fin init variables */

        $client = Client::getById($PClient);
        $calcMois = $mois - date('m');
        /*$dateDbt = $annee.'-'.$mois.'-01 00:00:00';*/
        $dateDbt = new DateTime('01/'.$mois.'/'.$annee);
        $dateDbt = date_format($dateDbt, 'Y-m-d H:i:s');
        $dateFin = $annee.'-'.date('m-d',(strtotime('last day of '.$calcMois.' month'))).' 23:59:59';

        $reserv = Reservation::getPeriodeByClient('2016-05-01 00:00:00', '2016-05-31 23:59:59', 1);

        // Si récup pas l'objet, pour test, a la place de la ligne de au-dessus utilisé :
        //$reserv[] = Reservation::getById($client->getId_client());
        foreach($reserv as $value) {
            if (!$value)
                break;
            // Date et heure
            list($dbtDate, $dbtHeure) = explode(' ', $value->getDate_dbt());
            list($finDate, $finHeure) = explode(' ', $value->getDate_fin());
            // Tarif a utilisé
            if(is_null($client->getRaison_sociale())) {
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
            $dateD = new DateTime($value->getDate_dbt());
            $dateF = new DateTime($value->getDate_fin());
            $interval = date_diff($dateD, $dateF);
            $heure = $interval->format('%h');
            $minute = $interval->format('%i')/60;
            $prix = ($heure + $minute) * $tarif;
            // Création du tableau
            $data[] = array(
                // utf8_decode() Pour les accents
                utf8_decode(Salle::getById($value->getId_salle())->getNom_salle()),
                $dbtDate,
                $dbtHeure.' - '.$finHeure,
                $tarif,
                $prix,
            );
        }

        $chaineTarif = mb_convert_encoding('Tarif/heure (€)', 'cp1252');
        $chainePrix = mb_convert_encoding('Prix (€)', 'cp1252');

        // Instanciation de la classe dérivée
        $pdf = new PDFFacture();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $header = array('Salle', 'Date', 'Heure', $chaineTarif, $chainePrix);
        $pdf->Body($header, $data, $client); // $data -> tableau de tableau
        $pdf->Output();
    }

}