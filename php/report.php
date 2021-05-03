<?php
    require('fpdf/fpdf.php');
    // session_start();
    // if(!isset($_SESSION["favsport"])){
    //     echo "<script>
    // window.location.href='police.php';
    // alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    // </script>";
    // exit();
    // }
include_once "dbh.php";

if($_GET['photo']!=""){
    $photo=$_GET['photo'];
}
else{
    $photo='conv.jpg';
}
    $fid=$_GET['cdc'];
    // $b=$_GET['s'];
    $c=$_GET['cn'];
    $d=$_GET['ct'];
    // $e=$_GET['ca'];
    $f=$_GET['cs'];
    $g=$_GET['cd'];
    $h=$_GET['ia'];
    $i=$_GET['id'];
    $j=$_GET['nu'];
    $k=$_GET['g'];
    $l=$_GET['od'];
    $m=$_GET['cad'];

$sql2 = "SELECT * FROM `policeofficer` where OFF_ID='$l' ";
$result2 = mysqli_query($conn, $sql2);
$resultcheck2=mysqli_num_rows($result2);
$rows2 = mysqli_fetch_assoc($result2);

$n=$rows2['OFF_NAME'];


$sql3 = "SELECT STN_ID from pos where OFFID='$l'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_assoc($result3);
$b=$rows3['STN_ID'];

$sql3 = "SELECT STN_NAME from station where STN_ID='$b'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_assoc($result3);
$st_name=$rows3['STN_NAME'];

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('conv.jpg',15,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    //$this->Cell(70);
    // Title
    $this->SetTextColor(134,194,50);
    $this->Cell(0,10,'CRIME STACK',1,0,'C','True');
    $this->SetTextColor(0);
    $this->Ln(20);
    $this->Cell(80);
    $this->SetFont('Arial','BU',15);
    $this->Cell(30,10,'FIR Report',0,0,'C');
    // Line break
    $this->Ln(20);
}
// Page footer
function Footer()
{
    // Position at cm from bottom
    $this->SetY(-50);
    $this->SetFont('Arial','B',20);
    $this->Cell(60);
    $this->Cell(80,10,'Status: '.$GLOBALS['m'],1,1,'C');
    $this->Ln(20);

    $this->SetFont('Arial','B',15);
    $this->Cell(0,10,'Signature: '.$GLOBALS['n'],0,1,'R');
    $this->Ln(20);
    
}
}

// $date=$_GET['g'];
// $stat=$_GET['cad'];
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',12);
$pdf->Image('uploads/'.$photo,160,55,40);
// $pdf->Cell(180,8,'Photo',0,1,'R');

$pdf->SetFont('Arial','B',13);

$pdf->Cell(16,10,'Fir No: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$fid,0,1);
$pdf->SetFont('Arial','B',13);

$pdf->Cell(32,10,'Station Name: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$st_name,0,1);
$pdf->SetFont('Arial','B',13);


$pdf->Ln(7);
$pdf->Cell(35,10,'Criminal Name: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,ucwords($c),0,1);
$pdf->SetFont('Arial','B',13);

$pdf->Cell(45,10,'Time of Occurrence: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,substr($d,0,19),0,1);
$pdf->SetFont('Arial','B',13);

// $pdf->Cell(40,10,'Criminal Address:',0,0);
// $pdf->Cell(0.5);
// $pdf->SetFont('Arial','',13);
// $pdf->Cell(0,10,$e,0,1);
// $pdf->SetFont('Arial','B',13);

$pdf->Cell(30,10,'Crime Scene: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$f,0,1);
$pdf->SetFont('Arial','B',13);

$pdf->Cell(0,10,'Crime Description: ',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Multicell(0,5,$g,0,1);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);


$pdf->Cell(32,10,'Informer Name: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,ucwords($h),0,1);
$pdf->SetFont('Arial','B',13);

$pdf->Cell(40,10,'Informer Address: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$i,0,1);
$pdf->SetFont('Arial','B',13);

$pdf->Cell(20,10,'Number: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$j,0,1);
$pdf->SetFont('Arial','B',13);


$pdf->Cell(13,10,'Date: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$k,0,1);
$pdf->SetFont('Arial','B',13);


$pdf->Cell(23,10,'Officer ID: ',0,0);
$pdf->Cell(0.5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,$l,0,1);
$pdf->SetFont('Arial','B',13);


$pdf->Output();
?>