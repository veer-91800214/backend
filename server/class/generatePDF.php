<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
   public $name;
   public $mailId;
   public $marks;
   public $mobileNo;
// Page header

function Header()
{
    // Logo
    // $this->Image('logo.png',10,6,30);
    // set  fill color to grey
    $this->SetFillColor(193, 231, 255);
    // $this->SetFillColor(0, 51, 82);
    $this->SetFont('Arial','',20);
    $this->SetTextColor(255, 121, 0);
    $this->Cell(95,20,'INNO',0,0,'R',TRUE);
    // $this->SetFillColor(255, 121, 0);
    $this->SetFont('Arial','B',20);
    $this->SetTextColor(0, 51, 82);
    $this->Cell(95,20,'RAFT',0,0,'L',TRUE);
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function setDetails($name="N/A",$mailId="N/A",$marks=array(array("N/A",0)),$mobileNo="N/A"){
$this->name=$name;
$this->mailId=$mailId;
$this->marks=$marks;
$this->mobileNo=$mobileNo;
}

}
// if(isset($_SESSION['name']) && isset($_SESSION['mail'])){
// $pdf = new PDF();
//         $pdf->AliasNbPages();
//         $pdf->AddPage();
//         $pdf->setDetails($name,$mailId,$marks,$phoneNo);

//         $pdf->Ln(10);
//         $pdf->Image("logo.jpeg", 165, 35, 30, 35);
//         $pdf->SetFont('Times', '', 12);
//         $pdf->Cell(25, 10, 'Name:' . $pdf->name, 0, 1, '');
//         $pdf->Cell(29, 10, 'Mail ID: ' . $pdf->mailId, 0, 1, '');
//         $pdf->Cell(34, 10, 'Mobile No: ' . $pdf->mobileNo, 0, 1, '');
//         $pdf->Ln(10);

//         $pdf->SetFillColor(194, 330, 230);
//         $pdf->Cell(95, 10, 'Subject', 1, 0, 'C', TRUE);
//         $pdf->Cell(95, 10, 'Marks', 1, 1, 'C', TRUE);
//         foreach($marks as $m){
//             $pdf->Cell(95, 10, $m[0], 1, 0, 'C');
//             $pdf->Cell(95, 10, $m[1], 1, 1, 'C');
      
//         }
//         $pdf->Output();
//     }
//     else 
//     echo "noo session";

?> 