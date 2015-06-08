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
        for($i=1;$i<=40;$i++)
            $pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
        $pdf->Output();
    }

}