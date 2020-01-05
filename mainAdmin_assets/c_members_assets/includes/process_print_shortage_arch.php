<?php
//require('fpdf17/fpdf.php');
require($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/fpdf17/fpdf.php");
//db connection
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");


  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }

  class myPDF extends FPDF{
      function header_old($vSky, $dPt, $other_dPt, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel){
            $getinputdate = queryn($vSky, "SELECT DISTINCT `gen_date` FROM `arch_trips` WHERE `arch_id`='$year_month' LIMIT 1");
            if($d = arr($getinputdate)){
                $inputD = $d[0];
            }
          
            $divi = explode("_", $year_month);
            $y_m = $divi[1];
            $con = date('F Y', strtotime($y_m));
            $con2 = strtoupper(date('d-F-y', strtotime($inputD)));
            $caps = strtoupper($con);
        if($dPt == "pdt" && $other_dPt == "non"){
            
            $this->SetFont('TwCenMTB','',16);
            $this->Cell(165,7,'FREIGHT CLAIMS FOR '.$caps, 0,1);

        }else if( $dPt != "pdt" && $other_dPt == "non" ){
            
            $this->SetFont('TwCenMTB','',16);
            $this->Cell(165,7,$dPt.' FREIGHT CLAIMS FOR '.$caps, 0,1);

        }else if( $dPt != "pdt" && $other_dPt != "non" ){

            $this->SetFont('TwCenMTB','',16);
            $this->Cell(165,7,$dPt.' AND '.$other_dPt.' FREIGHT CLAIMS FOR '.$caps, 0,1);

        
        }
          
          $this->SetFont('TwCenMTB','',8);
          $this->Cell(36,7,'PRESENTED TO:',0,0);
          
          $this->SetFont('TwCenMT','',8);
          $this->Cell(0,7,$ePresTo,0,1);

          $this->Cell(36,0,'',0,0);
          $this->Cell(0,4,$eMaincomName,0,1);
          
          $this->Cell(36,0,'',0,0);
          $this->Cell(0,7,$eLocation,0,1);
          $this->Ln(10);
          
          $this->SetFont('TwCenMTB','',8);
          $this->Cell(36,7,'TRANSPORTER:',0,0);
          
          $this->SetFont('TwCenMT','',8);
          $this->Cell(0,7,$tMaincomName,0,1);

          $this->Cell(36,0,'',0,0);
          $this->Cell(0,4,$tLocation,0,1);
          
          $this->Cell(36,0,'',0,0);
          $this->Cell(0,7,$tComTel,0,1);
          $this->Ln(10);
          
          $this->SetFont('TwCenMTB','',8);
          $this->Cell(36,7,'DATE:',0,0);
          
          $this->SetFont('TwCenMT','',8);
          $this->Cell(0,7,$con2,0,1);
      }

      function footer(){
         $this->SetY(-15);
         $this->SetFont('TwCenMTB','',0);
         $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
      
      function d($tMaincomName){
         
          $this->SetFont('TwCenMTB','',8);
          $this->Cell(190,7,'.........................................',0,1);
          $this->SetFont('TwCenMT','',8);
          $this->Cell(190,5,'FOR AND ON BEHALF OF',0,1);
          $this->Cell(190,5,$tMaincomName,0,1);
           
          
      }

      
      function myCell($w,$h,$x,$t){
        $height = $h/4;
        $first = $height+15;
        $second = ($height*3)+2;
        $third = ($height*4)+10;
        $fouth = ($height*5)+2;
        $fth = ($height*6)+2;
        $len = strlen($t);

        $strCount = str_word_count($t, 1);
        $c = count($strCount);
        
         if($len > 2){
            $i = 0;
            $minus = 0;
            
          foreach($strCount as $word){
           // $txt = str_split($t,10);

           if($i == 0){
              $this->SetX($x);
              $this->Cell($w,$first,$word,'','','C');
           }else if($i == 1){
              $this->SetX($x);
              $this->Cell($w,$second,$word,'','','C');
           }else if($i == 2){
              $this->SetX($x);
              $this->Cell($w,$third,$word,'','','C'); 
           }else if($i == 3){
              $this->SetX($x);
              $this->Cell($w,$fouth,$word,'','','C'); 
           }else if($i == 4){
              $this->SetX($x);
              $this->Cell($w,$fth,$word,'','','C'); 
           }
             $i++;
          }

            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,'C',0);

        }else{
              $this->SetX($x);
              $this->Cell($w,$h,'LTRB',0,'',0);
            }
      
    }

      function headerTable(){
        
            $this->SetFont('TwCenMTB','','7.5');
          
            $this->Cell(23,15,'NUMBER',1,0,'C');
            $this->Cell(23,15,'LOADING DATE',1,0,'C');

            $x = $this->GetX();
            self::myCell(23,15,$x,'DATE DISCHARGING');

            $this->Cell(20,15,'WAYBILL No.',1,0,'C');
            $this->Cell(20,15,'VEHICLE No.',1,0,'C');
            $this->Cell(23,15,'PRODUCT',1,0,'C');

            $this->Cell(23,15,'QUANTITY',1,0,'C');

            $x = $this->GetX();
            self::myCell(23,15,$x,'PT LOADING');

            $x = $this->GetX();
            self::myCell(23,15,$x,'PT DISCHARGING');

            $this->Cell(20,15,'DISTANCE',1,0,'C');

            $this->Cell(20,15,'RATE',1,0,'C');

            $this->Cell(20,15,'AMOUNT',1,0,'C');

            $this->Ln();
      }

      function viewTable($vSky, $dPt, $other_dPt, $company_name, $year_month){
          $this->SetFont('TwCenMT','','7');
          
        if($dPt == "pdt" && $other_dPt == "non"){
                                                                      
            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$company_name' AND `arch_id`='$year_month'");

            }else if( $dPt != "pdt" && $other_dPt == "non" ){

            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$company_name' AND `discharging_pt`='$dPt' AND `arch_id`='$year_month'");  

            }else if( $dPt != "pdt" && $other_dPt != "non" ){

            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$company_name' AND (`discharging_pt`='$dPt' OR `discharging_pt`='$other_dPt') AND (`arch_id`='$year_month')");

            }
          
          $total = 0;
          $i = 0;

        while($fetch = mysqli_fetch_assoc($vSkyStmt)){
            $this->Cell(23,10,$fetch['id'],1,0,'C');
            $this->Cell(23,10,$fetch['loading_date'],1,0,'C');
            $this->Cell(23,10,$fetch['discharging_date'],1,0,'C');
            $this->Cell(20,10,$fetch['waybill_no'],1,0,'C');
            $this->Cell(20,10,$fetch['truck_no'],1,0,'C');
            $this->Cell(23,10,$fetch['product'],1,0,'C');
            $this->Cell(23,10,$fetch['qty'],1,0,'C');
            $this->Cell(23,10,$fetch['loading_pt'],1,0,'C');
            $this->Cell(23,10,$fetch['discharging_pt'],1,0,'C');
            $this->Cell(20,10,$fetch['distance'],1,0,'C');
            $this->Cell(20,10,$fetch['rate'],1,0,'C');
            $this->Cell(20,10,$fetch['amount'],1,0,'C');
            $this->Ln(10);
            $total += $fetch['amount'];
            $i++;
        }
            //$x = $this->GetY();
            $this->SetFont('TwCenMTB','','12');
            $this->Cell(220,0,'',0,0);
            $this->Cell(0,20,'TOTAL    '.$total,0,0);
          
            $x = $this->GetY();
            $this->Line(231, $x+12, 270, $x+12);
            $this->Line(231, $x+13, 270, $x+13);
            $this->Ln();
      }
      
  }


if(isset($_REQUEST['r_c_n']) && isset($_REQUEST['dPt_arc']) && isset($_REQUEST['other_dPt']) && isset($_REQUEST['year_month']) ){
    
    $ePresTo = escape($vSky, $_REQUEST['ePresTo']);
    $eMaincomName = escape($vSky, $_REQUEST['eMaincomName']);
    $eLocation = escape($vSky, $_REQUEST['eLocation']);
    $eComTel = escape($vSky, $_REQUEST['eComTel']);
    $tPresentedTo = escape($vSky, $_REQUEST['tPresentedTo']);
    $tMaincomName = escape($vSky, $_REQUEST['tMaincomName']);
    $tLocation = escape($vSky, $_REQUEST['tLocation']);
    $tComTel = escape($vSky, $_REQUEST['tComTel']);
    
    $company_name = escape($vSky, $_REQUEST['r_c_n']);
    $dPt = escape($vSky, $_REQUEST['dPt_arc']); //pdt
    $other_dPt = escape($vSky, $_REQUEST['other_dPt']); //non
    $year_month = escape($vSky, $_REQUEST['year_month']);

    $pdf = new myPDF();
    $pdf->AddFont('TwCenMT','','TwCenMT.php');
    $pdf->AddFont('TwCenMTB','','TCB.php');
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->header_old($vSky, $dPt, $other_dPt, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel);
    $pdf->headerTable();
    $pdf->viewTable($vSky, $dPt, $other_dPt, $company_name, $year_month);
    $pdf->d($tMaincomName);
    $pdf->Output();

}  
?>