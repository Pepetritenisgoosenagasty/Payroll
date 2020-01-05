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
      function header_old($dPt, $other_dPt, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel){
          
            $con = date('F Y', strtotime($year_month));
            $con2 = date('d-F-y');
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

      function viewTable($vSky, $dPt, $other_dPt, $company_name, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel){
          
          $arch = "arch_".$year_month;
          $con3 = date('Y-m-d');

          $this->SetFont('TwCenMT','','7');
          
        if($dPt == "pdt" && $other_dPt == "non"){

            $vSkyStmt = queryn($vSky, "SELECT * FROM `trips_history` WHERE `sub_company_name`='$company_name' AND DATE_FORMAT(`discharging_date`,'%Y-%m')='$year_month'");

        }else if( $dPt != "pdt" && $other_dPt == "non" ){

          $vSkyStmt = queryn($vSky, "SELECT * FROM `trips_history` WHERE `sub_company_name`='$company_name' AND `discharging_pt`='$dPt' AND DATE_FORMAT(`discharging_date`,'%Y-%m')='$year_month'");  

        }else if( $dPt != "pdt" && $other_dPt != "non" ){
            
            $vSkyStmt = queryn($vSky, "SELECT * FROM `trips_history` WHERE `sub_company_name`='$company_name' AND (`discharging_pt`='$dPt' OR `discharging_pt`='$other_dPt') AND (DATE_FORMAT(`discharging_date`,'%Y-%m')='$year_month')");

            }
          
          $total = 0;
          $i = 0;
          $f = false;

        while($fetch = mysqli_fetch_assoc($vSkyStmt)){
            
            //////////////////check if its already in arch //////////////////////////////////////
            
            $chk = queryn($vSky, "SELECT `arch_id` FROM `arch_trips` WHERE `arch_id`='$arch'");
            $rows_chk = rows($chk);
            
            if($rows_chk > 0){
                
                $insert_arch = true;
                
            }else{
                            
            $insert_arch = queryn($vSky, "INSERT INTO `arch_trips`(`arch_id`, `emp_id`, `driver_id`, `driver_name`, `location_id`, `main_company_name`, `sub_company_name`, `loading_date`, `discharging_date`, `waybill_no`, `truck_no`, `truck_id`, `product`, `qty`, `loading_pt`, `discharging_pt`, `distance`, `rate`, `amount`, `shortage`, `shortage_val`, `overnight_allowance`, `amount_due`, `fuel_consumed`, `fuel_consumed_in_cash`, `pay_due_kodson`, `amt_recievable`, `cash_paid_to_make_loss`, `balance`, `receipt_no`, `is_done`, `is_inprogress`, `input_date_time`, `presented_to`, `main_name`, `location`, `tel`, `transporter`, `t_name`, `name`, `t_adrress`, `t_tel`, `gen_date`) VALUES ('".$arch."', '".$fetch['emp_id']."', '".$fetch['driver_id']."', '".$fetch['driver_name']."', '".$fetch['location_id']."', '".$fetch['main_company_name']."', '".$fetch['sub_company_name']."', '".$fetch['loading_date']."', '".$fetch['discharging_date']."', '".$fetch['waybill_no']."', '".$fetch['truck_no']."', '".$fetch['truck_id']."', '".$fetch['product']."', '".$fetch['qty']."', '".$fetch['loading_pt']."', '".$fetch['discharging_pt']."', '".$fetch['distance']."', '".$fetch['rate']."', '".$fetch['amount']."', '".$fetch['shortage']."', '".$fetch['shortage_val']."', '".$fetch['overnight_allowance']."', '".$fetch['amount_due']."', '".$fetch['fuel_consumed']."', '".$fetch['fuel_consumed_in_cash']."', '".$fetch['pay_due_kodson']."', '".$fetch['amt_recievable']."', '".$fetch['cash_paid_to_make_loss']."', '".$fetch['balance']."', '".$fetch['receipt_no']."', '".$fetch['is_done']."', '".$fetch['is_inprogress']."', '".$fetch['input_date_time']."', '".$ePresTo."', '".$eMaincomName."', '".$eLocation."', '".$eComTel."', '".$company_name."', '".$tMaincomName."', '".$fetch['main_company_name']."', '".$tLocation."', '".$tComTel."', '".$con3."')");
                
            }
            
            if($insert_arch){
            $this->Cell(23,10,$i,1,0,'C');
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
            $f = true;  
            }
            
                           
            if($f){

                $del = queryn($vSky, "DELETE FROM `trips_history` WHERE `id`='".$fetch['id']."'");
                if($del){
                    $f = false;
                }
            }
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


if(isset($_REQUEST['r_c_n']) && isset($_REQUEST['dPt']) && isset($_REQUEST['other_dPt']) && isset($_REQUEST['year_month']) ){
    
    $ePresTo = escape($vSky, $_REQUEST['ePresTo']);
    $eMaincomName = escape($vSky, $_REQUEST['eMaincomName']);
    $eLocation = escape($vSky, $_REQUEST['eLocation']);
    $eComTel = escape($vSky, $_REQUEST['eComTel']);
    $tPresentedTo = escape($vSky, $_REQUEST['tPresentedTo']);
    $tMaincomName = escape($vSky, $_REQUEST['tMaincomName']);
    $tLocation = escape($vSky, $_REQUEST['tLocation']);
    $tComTel = escape($vSky, $_REQUEST['tComTel']);
    
    $company_name = escape($vSky, $_REQUEST['r_c_n']);
    $dPt = escape($vSky, $_REQUEST['dPt']); //pdt
    $other_dPt = escape($vSky, $_REQUEST['other_dPt']); //non
    $year_month = escape($vSky, $_REQUEST['year_month']);
    

    $pdf = new myPDF();
    $pdf->AddFont('TwCenMT','','TwCenMT.php');
    $pdf->AddFont('TwCenMTB','','TCB.php');
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->header_old($dPt, $other_dPt, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel);
    $pdf->headerTable();
    $pdf->viewTable($vSky, $dPt, $other_dPt, $company_name, $year_month, $ePresTo, $eMaincomName, $eLocation, $eComTel, $tPresentedTo, $tMaincomName, $tLocation, $tComTel);
    $pdf->d($tMaincomName);
    $pdf->Output($company_name.'.pdf', 'i');

}  
?>