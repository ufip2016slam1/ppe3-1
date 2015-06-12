<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 08/06/2015
 * Time: 11:20
 */
require_once 'Contenu/facturation/fpdf.php';

class PDFFacture extends FPDF {
    // En-tête
    function Header()
    {
        $adresseMLL = utf8_decode("Maison des Ligues\n10 rue de la poupée qui tousse\n06 000 NICE\n04.XX.XX.XX.XX");
        $adresseCLient = utf8_decode("RS ou nom\nXX avenue quelquechose\n 00 000 VILLE");
        // Logo
        $this->Image('Contenu/images/logo.jpg');
        $this->SetXY(110,20);
        // Police Arial gras 15
        $this->SetFont('Arial','',12);
        // adresse MLL
        $this->MultiCell(80,8,$adresseMLL,0, 'C');
        $this->ln(20);

        $this->MultiCell(0, 8, $adresseCLient,0,'C');
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

