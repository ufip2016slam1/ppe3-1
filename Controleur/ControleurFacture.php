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

    public function test() {
        // Instanciation de la classe dérivée
        $pdf = new PDFFacture();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        $header = array('Salle', 'Date', 'Heure', 'tarif(1h)', 'Prix');
        $pdf->BasicTable($header, $data); // $data -> tableau de tableau
        $pdf->Output();
    }

}