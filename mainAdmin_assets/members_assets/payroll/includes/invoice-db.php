<?php
require('fpdf17/fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'invoicedb');

//get invoices data
$query = mysqli_query($con,"select * from invoice
	inner join clients using(clientID)
	where
	invoiceID = '".$_GET['invoiceID']."'");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddFont('TwCenMT','','TwCenMT.php');
$pdf->AddFont('TwCenMTB','','TCB.php');

$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
$width=$pdf -> w;
//$pdf->Image('mark6.png',10,90,189);

//set font to arial, bold, 14pt
$pdf->SetFont('TwCenMT','',20);

//Cell(width , height , text , border , end line , [align] )


$pdf->Cell(189	,5,'KODSON PLUS CO. LTD',0,1);

$pdf->SetFont('TwCenMTB','',8);
$pdf->Cell(189	,5,'PLOT # 10 OLD ADA ROAD. BOX SK 519 SAKUMONO, TEMA.',0,1);

$pdf->SetFont('TwCenMT','',8);
$pdf->Cell(189	,5,'TEL: 0303305730     email : kodsontransport@gmail.com',0,1);

//             x1 y1 x2 y2
$pdf->Line(10, 25, 189, 25);

$pdf->SetFont('TwCenMTB','',16);
$pdf->Cell(90,5,'',0,0);
$pdf->Cell($width/2,10,'[date]',0,1);

$pdf->Cell(189, 5, '', 0, 1);

$pdf->SetFont('TwCenMT','',10);

$pdf->Cell(189, 5, 'TO :', 0, 1);
$pdf->SetFont('TwCenMT','',10);
$pdf->Cell(130	,5,'[THE MANAGER]',0,1);
$pdf->Line(10, 50, 70, 50);

$pdf->Cell(130	,5,'[UNIBANK GHANA LTD]',0,1);//end of line
$pdf->Line(10, 55, 70, 55);


$pdf->Cell(130	,5,'[ASHAIMAN]',0,01);
$pdf->Line(10, 60, 70, 60);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,3,'Kindly credit the cheque attached ( CHQ #. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )
',0,1);

$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->Cell(189	,3,'a total of. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ',0,1);

$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->Cell(189	,3,'to the accounts listed below, out of our account held at your branch. (Account #. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,15,'',0,1);//end of line

//invoice contents
$i=0;
while($i <= 5){
    $pdf->SetFont('TwCenMTB','',8);

    if($pdf->GetX() < 290){        
        if($i == 1){
    $pdf->Cell(37.4,15,'No.',1,'','C');
        }else if($i == 2){
    $pdf->Cell(37.4,15,'NAME',1,'','C');
        }else if($i == 3){
    $pdf->Cell(37.4,15,'BANK ACCOUNT NUMBER',1,'','C');
        }else if($i == 4){
    $pdf->Cell(37.4,15,'BANK, BRANCH',1,'','C');
        }else if($i == 5){
    $pdf->Cell(37.4,15,'NET SALARY PAYABLE',1,1,'C');
        }
    }else{
     $pdf->Ln(20);
    }
    $i++;
}

//Numbers are center-aligned so we give 'R' after new line parameter
$pdf->SetFont('TwCenMT','',8);
//items
$query = mysqli_query($con,"select * from item where invoiceID = '".$invoice['invoiceID']."'");
$tax = 0; //total tax
$amount = 0; //total amount
$c = 1;

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(37.4	,5,$c,1,0,'C');
	$pdf->Cell(37.4	,5,$item['itemName'],1,0,'C');
	//add thousand separator using number_format function
    $pdf->Cell(37.4	,5,'$'.number_format($item['tax']),1,0,'C');
	$pdf->Cell(37.4	,5,'$'.number_format($item['tax']),1,0,'C');
	$pdf->Cell(37.4	,5,'$'.number_format($item['amount']),1,1,'C');//end of line
	//accumulate tax and amount
	$tax += $item['tax'];
	$amount += $item['amount'];
    $c++;
}

//$pdf->Cell(112	,5,'',0,0);
//$pdf->Cell(37.6	,5,'Tax Rate',0,0);
//$pdf->Cell(4	,5,'$',1,0);
//$pdf->Cell(33.4	,5,'10%',1,1,'R');//end of line

$pdf->Cell(127	,5,'',0,0);
$pdf->Cell(22.6	,5,'Total',0,0);
//$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(37.4	,5,'$'.number_format($amount + $tax),1,1,'C');//end of line
 
     
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,3,'................................................................',0,1);
$pdf->Cell(189	,3,'',0,1);//end of line
$pdf->Cell(10	,3,'',0,);//end of line
$pdf->Cell(139	,3,'Aproved By CEO',0,1);

$pdf->Output();
?>
