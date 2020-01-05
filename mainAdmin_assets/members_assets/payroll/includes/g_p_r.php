<?php
require('fpdf17/fpdf.php');

//db connection
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }

if(isset($_REQUEST['sky'])){
    //get invoices data
        $valPayId = $_REQUEST['sky'];
    
        $valPayID2 = base64_decode($valPayId);
    
    $query10 = mysqli_query($vSky, "SELECT * FROM `payroll_store` WHERE `ready_for_printing`=1");
    $countdem = mysqli_num_rows($query10);
    
    if($countdem > 0){
           
    $query = mysqli_query($vSky,"SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_bank_account_no`, emp.`emp_bank_branch`, pr.*,py.*
                        FROM `pay_dates_pay` AS py 
                        INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=py.`emp_id` 
                        INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id` 
                        WHERE py.`payroll_lastPayId`=pr.`id` AND pr.`ready_for_printing`='1'");
    
                if($row = mysqli_fetch_assoc($query)){
                    $lastDate = $row['last_payDate'];
                }
    
    
    $query_system = mysqli_query($vSky, "SELECT * FROM `sys_settings`");
    while($get_infos = mysqli_fetch_assoc($query_system)){
        $com_name = $get_infos['company_name'];
        $com_currency = $get_infos['currency'];
        $com_location = $get_infos['location'];
        $com_tel = $get_infos['tel'];
        $com_email = $get_infos['email'];
        $com_name_onPyaslip = $get_infos['name_on_payslip'];
        $com_bankNameOnPaySlip = $get_infos['bank_name_on_payslip'];
        $com_bankLocationOnPaySlip = $get_infos['bank_location_on_payslip'];
    }
    
    
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddFont('TwCenMT','','TwCenMT.php');
$pdf->AddFont('TwCenMTB','','TCB.php');

$pdf->AddPage();

$width=$pdf -> w;

//set font to arial, bold, 14pt
$pdf->SetFont('TwCenMT','',20);

//Cell(width , height , text , border , end line , [align] )


$pdf->Cell(189	,5,$com_name,0,1);

$pdf->SetFont('TwCenMTB','',8);
$pdf->Cell(189	,5,$com_location,0,1);

$pdf->SetFont('TwCenMT','',8);
$pdf->Cell(189	,5,'TEL : '.$com_tel.'       email :'.$com_email,0,1);

//             x1 y1 x2 y2
$pdf->Line(10, 25, 189, 25);

$pdf->SetFont('TwCenMTB','',16);
$pdf->Cell(80,5,'',0,0);
$pdf->Cell(94.5,10, $lastDate,0,1);

$pdf->Cell(189, 5, '', 0, 1);

$pdf->SetFont('TwCenMT','',10);

$pdf->Cell(189, 5, 'TO :', 0, 1);
$pdf->SetFont('TwCenMT','',10);
$pdf->Cell(130	,5,$com_name_onPyaslip,0,1);
$pdf->Line(10, 50, 70, 50);

$pdf->Cell(130	,5,$com_bankNameOnPaySlip,0,1);//end of line
$pdf->Line(10, 55, 70, 55);


$pdf->Cell(130	,5,$com_bankLocationOnPaySlip,0,01);
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

    if($pdf->GetX() <= 290){        
        if($i == 1){
    $pdf->Cell(10.4,15,'No.',1,'','C');
        }else if($i == 2){
    $pdf->Cell(47.4,15,'NAME',1,'','C');
        }else if($i == 3){
    $pdf->Cell(47.4,15,'BANK ACCOUNT NUMBER',1,'','C');
        }else if($i == 4){
    $pdf->Cell(55.4,15,'BANK, BRANCH',1,'','C');
        }else if($i == 5){
    $pdf->Cell(29.4,15,'NET SALARY PAYABLE',1,1,'C');
        }
    }else{
     $pdf->Ln(20);
    }
    $i++;
}

//Numbers are center-aligned so we give 'R' after new line parameter
$pdf->SetFont('TwCenMT','',8);
//items
        $totBasicPay = 0;
        $totDeductions = 0;
        $totNetSalary = 0;
        $totNetSalaryPayable = 0;
    
$amount = 0; //total amount
$c = 1;
        $query_l = mysqli_query($vSky,"SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_bank_account_no`, emp.`emp_bank_branch`, pr.*,py.*
                        FROM `pay_dates_pay` AS py 
                        INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=py.`emp_id` 
                        INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id` 
                        WHERE py.`payroll_lastPayId`=pr.`id` AND pr.`ready_for_printing`='1'");

//display the items
while($item = mysqli_fetch_array($query_l)){
    
        if($item['empnet_salary_payable'] > 0){
    
            $pdf->Cell(10.4	,5 ,$c,1,0,'C');
            $pdf->Cell(47.4	,5 ,$item['emp_name'],1,0,'L');
            //add thousand separator using number_format function
            $pdf->Cell(47.4	,5 ,$item['emp_bank_account_no'],1,0,'L');
            $pdf->Cell(55.4	,5 ,$item['emp_bank_branch'],1,0,'L');
            $pdf->Cell(29.4	,5 , number_format($item['empnet_salary_payable'], 2),1,1,'R');//end of line
            //accumulate tax and amount
            $amount += sprintf("%0.2f",$item['empnet_salary_payable']);
            $c++;
            
            }else{
            
            $pdf->Cell(10.4	,5 ,$c,1,0,'C');
            $pdf->Cell(47.4	,5 ,$item['emp_name'],1,0,'L');
            //add thousand separator using number_format function
            $pdf->Cell(47.4	,5 ,$item['emp_bank_account_no'],1,0,'L');
            $pdf->Cell(55.4	,5 ,$item['emp_bank_branch'],1,0,'L');
            $pdf->Cell(29.4	,5 , "-",1,1,'C');//end of line
            //accumulate tax and amount
            $amount += sprintf("%0.2f",$item['empnet_salary_payable']);
            $c++;
                
            }
}

$pdf->SetFont('TwCenMT','',12);

$pdf->Cell(141	,5,'',0,0);
$pdf->Cell(19.6	,5,'Total',0,0);
$pdf->Cell(29.4	,5, number_format($amount, 2),1,1,'C');//end of line
 
     
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,3,'................................................................',0,1);
$pdf->Cell(189	,3,'',0,1);//end of line
$pdf->Cell(10	,3,'',0,0);//end of line
$pdf->Cell(139	,3,'Approved By CEO',0,1);

$pdf->Output();

        $update_ready = mysqli_query($vSky, "UPDATE `payroll_store` SET `ready_for_printing`='0'");
        
    if($update_ready){
            
        mysqli_query($vSky, "DELETE FROM `payroll_store` WHERE `ready_for_deleting`='1'");
            
        } 
    }else{
        echo "<h3> <span style='text-align:center; margin-left:450px; padding-top:10px; color:red;'> Please Go Back To Payroll To Report To Get All Generated Payslips</span><h3>";
    }

    
}else{
        echo "<h3> <span style='text-align:center; margin-left:450px; padding-top:10px; color:red;'> Please Go Back To Payroll To Report To Get All Generated Payslips</span><h3>";
    }

?>
