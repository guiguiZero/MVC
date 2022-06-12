<?php
  require(ROOT.'app/fpdf.php');
  class PDF extends FPDF{
    function Header(){
    // Logo
    $this->Image(ROOT.'Views/images/logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Saut de ligne
    $this->Ln(20);
  }

  function Chapitre($num){
    $this->SetFont('Arial', '', 15);
    $this->Cell(0,6,"Facture Numero : ".$num, 0, 1, 'C');
    $this->Ln(4);
  }

  function infos($datas){
    var_dump($datas);
  }

  // Pied de page
  function Footer(){
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
 ?>
