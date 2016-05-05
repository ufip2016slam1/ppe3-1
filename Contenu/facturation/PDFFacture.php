<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 08/06/2015
 * Time: 11:20
 */
require_once 'Contenu/facturation/fpdf/fpdf.php';

class PDFFacture extends FPDF {
    // En-tête
    function Header()
    {
        $adresseMLL = utf8_decode("Maison des Ligues\n10 rue de la poupée qui tousse\n06 000 NICE\n04.XX.XX.XX.XX");
        // Logo
        $this->Image('Contenu/images/logo.jpg');
        $this->SetXY(110,20);
        // Police Arial gras 15
        $this->SetFont('Arial','',12);
        // adresse MLL
        $this->MultiCell(80,8,$adresseMLL,0, 'C');
        $this->ln(20);
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

    // Tableau simple
    // @param array $header Les colonnes
    // @param array $data Les données
    function Body($header, $data, $objetClient)
    {
        // adresse du client
        $adresseCLient = utf8_decode($objetClient->getNom()."\n".$objetClient->getAdresse()."\n ".$objetClient->getCodePostal()." ".$objetClient->getVille());

        $this->MultiCell(0, 8, $adresseCLient,0,'C');
        $this->ln(20);
        // ----- fin adresse du client

        $largeurCol = array(50, 30, 50, 30, 30);
        // entete tableau
        foreach($header as $k => $col)
            $this->Cell($largeurCol[$k],8,$col,1,0,'C');
        $this->Ln();
        // ----- fin entete tableau

        foreach ($data as $row) {
            foreach ($row as $k => $col) {
                $this->Cell($largeurCol[$k],8,$col,1);
            }
            $this->Ln();
        }
        /*$this->ln(28);
        $this->Cell($largeurTab, $hauteurTab, '', 1);
        $this->ln(-8);

        $this->SetFont('helvetica','',12);
        $this->SetTextColor(216, 31, 42);*/
        /*// En-tête du tableau
        foreach($header as $col)
            $this->Cell($largeur,8,$col,1,0,'C');
        $this->Ln();

        $this->SetFont('Arial','',10);
        $this->SetTextColor(0, 0, 0);
        // Données

        if($nbData*$hauteur > $hauteurTab) {
            foreach($data as $row)
            {
                foreach($row as $col)
                    $this->Cell($largeur,$hauteur,$col,1); // param : 1=largeur 2=Hauteur 3=Contenue
                $this->Ln();
                $total += $row[4];
                $nb += 1;
                if($nb == ($hauteurTab/$hauteur)) {
                    $this->ln(20);
                    $this->MultiCell(0, 8, $adresseCLient,0,'C');

                    $this->AddPage();
                    $this->ln(20);
                    $this->Cell($largeurTab, $hauteurTab, '', 1);
                    $this->ln(-8);
                    $this->SetFont('helvetica','',12);
                    $this->SetTextColor(216, 31, 42);
                    // En-tête du tableau
                    foreach($header as $col)
                        $this->Cell($largeur,8,$col,1,0,'C');
                    $this->Ln();

                    $this->SetFont('Arial','',10);
                    $this->SetTextColor(0, 0, 0);
                    $nb = 0;
                } 
            }
        }

        foreach($data as $row)
        {
            foreach($row as $col) {
                $this->Cell($largeur,$hauteur,$col,1); // param : 1=largeur 2=Hauteur 3=Contenue
            }
            $this->Ln();
            $total += $row[4];
            $nb += 1;
        }
        $total = mb_convert_encoding($total.'€', 'cp1252');
        $this->SetXY($this->GetX()+(count($header)-2)*$largeur, $this->GetY()+$hauteurTab-($hauteur*$nb));
        $this->Cell((count($header)-4)*$largeur,$hauteur,'Total du mois',1,0,'C');
        $this->Cell($largeur,$hauteur,$total,1);*/
    }
}


