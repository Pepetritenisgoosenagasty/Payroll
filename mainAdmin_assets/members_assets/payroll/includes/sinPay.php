<?php
require('fpdf17/fpdf.php');

//db connection

 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_REQUEST['__l_p@i$d_']) && isset($_REQUEST['_e_i@$d'])){
    //get invoices data
        $valPayId = $_REQUEST['__l_p@i$d_'];
        $valEmpId = $_REQUEST['_e_i@$d'];
    
        $valPayID2 = base64_decode($valPayId);
        $valEmpID2 = base64_decode($valEmpId);
    
//    Employee Name //Payroll Date //Employee Number //Category //Basic //'Debt Bal B/D //Employer(SSF) //Current Loans/ Surcharges //Employee(SSF) //Adjustments //Taxable Salary //Deductions //Paye //Other Deductions //Statutory Deduction //Net Before Other Deductions //Net Pay //Total Debt //Balance Outstanding //Total Deductions //Net Salary Payable //Bank Name //Bank branch //Bank Number //Description //Paind Amount
    
    $stmt2 = mysqli_query($vSky, "SELECT `emp_main_cat_id` FROM `employees` WHERE `emp_id`='$valEmpID2' LIMIT 1");
    if($rowr = mysqli_fetch_array($stmt2)){
        $catID = $rowr[0];
    }
    
    $catN = mysqli_query($vSky, "SELECT `cat_name` FROM `main_category` WHERE `cat_id`='$catID' LIMIT 1");
    if($catrow = mysqli_fetch_array($catN)){
        $catName = $catrow['cat_name'];
    }
    
    $query = mysqli_query($vSky,"SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_bank_account_no`, emp.`emp_bank_branch`, emp.`emp_ssnit`, pr.*,py.*
                        FROM `pay_dates_pay` AS py
                        INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=py.`emp_id` 
                        INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id` 
                        WHERE py.`payroll_lastPayId`=pr.`id` AND emp.`is_pending`='0' 
                        AND emp.`sacked`='0' AND py.`payroll_lastPayId`='$valPayID2' AND pr.`emp_id`='$valEmpID2'");
    
    if($row = mysqli_fetch_assoc($query)){
        $lastDate = $row['last_payDate'];
        $emp_name = $row['emp_name'];
        $emp_bank_no = $row['emp_bank_account_no'];
        $emp_bank_branch = $row['emp_bank_branch'];
        $emp_ssnit = $row['emp_ssnit'];
        $basic_pay = $row['basic_pay'];
        $current_loans_surcharges = $row['current_loans/surcharges'];
        $debt_bal_b_d = $row['debt_bal_b/d'];
        $employee_ssf = $row['employee_ssf'];
        $employer_ssf = $row['employer_ssf'];
        $adjustments = $row['adjustments'];
        $emp_taxable_salary = $row['emp_taxable_salary'];
        $deductions = $row['deductions'];
        $emp_paye = $row['emp_paye'];
        $emp_oter_deductions = $row['emp_oter_deductions'];
        $emp_total_statutory_deductions = $row['emp_total_statutory_deductions'];
        $net_before_deductions = $row['net_before_deductions'];
        $emp_net_salary = $row['emp_net_salary'];
        $total_debt = $row['total_debt'];
        $bal_outstanding = $row['bal_outstanding'];
        $total_deductions = $row['total_deductions'];
        $empnet_salary_payable = $row['empnet_salary_payable'];
        $payment_method = $row['payment_method'];
        $emp_bicycle_deduction = $row['emp_bicycle_deduction'];
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

    if($com_currency == "GHC"){
        $currency = "GHC";
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
$pdf->Line(9.2, 25, 198.5, 25);
$pdf->Line(9.2, 35, 9, 45);

$pdf->SetFont('TwCenMTB','',16);
$pdf->Cell(80,5,'',0,0);
$pdf->Cell(94.5,10, 'P A Y S L I P',0,1);

$pdf->SetFont('TwCenMTB','',10);
$pdf->Line(9.2, 35, 198.5, 35);
$pdf->Cell(37.25, 5, 'Employee Name', 0, 0);
$pdf->Cell(57.25, 5, $emp_name, 0, 0);
$pdf->Cell(47.25, 5, 'Payroll Date', 0, 0);
$pdf->Cell(47.25, 5, $lastDate, 0, 1);

$pdf->Cell(37.25, 5,'SSNIT Number', 0, 0);
$pdf->Cell(57.25, 5, $emp_ssnit, 0, 0);
$pdf->Cell(47.25, 5, 'Category', 0, 0);
$pdf->Cell(47.25, 5, $catName, 0, 1);
$pdf->Line(9.2, 45, 198.5, 45);
$pdf->Line(198.5, 35, 198.5, 45);

$pdf->Line(9.2, 49.5, 198.5, 49.5);
$pdf->Line(198.5, 49.5, 198.5, 110.7);

$pdf->Line(9.2, 49.5, 9.2, 110.7);

$pdf->Cell(47.25,5,'', 0, 1);
$pdf->setFillColor(216,233,237); 
//$pdf->Cell(0,10,$text,0,1,'L',1); //your cel
$pdf->Cell(47.25,5,'Description', 0, 0,'L',1);
$pdf->Cell(46,5,'Amount', 0, 0,'L',1);
$pdf->Cell(47.25,5,'Description', 0, 0,'L',1);
$pdf->Cell(47.25,5,'Amount', 0, 1,'l',1);

$pdf->Cell(47.25,5,'Basic', 0, 0);
$pdf->Cell(46,5,$basic_pay, 0, 0);
$pdf->Cell(47.25,5,'Debt Bal B/D:', 0, 0);
$pdf->Cell(47.25,5,$debt_bal_b_d, 0, 1);

$pdf->Cell(47.25,5,'Employer(SSF)', 0, 0);
$pdf->Cell(46,5,$employer_ssf, 0, 0);
$pdf->Cell(47.25,5,'Current Loans/ Surcharges:', 0, 0);
$pdf->Cell(47.25,5,$current_loans_surcharges, 0, 1);

$pdf->Cell(47.25,5,'Employee(SSF)', 0, 0);
$pdf->Cell(46,5,$employee_ssf, 0, 0);
$pdf->Cell(47.25,5,'Adjustments:', 0, 0);
$pdf->Cell(47.25,5,$adjustments, 0, 1);

$pdf->Cell(47.25,5,'Taxable Salary', 0, 0);
$pdf->Cell(46,5,$emp_taxable_salary, 0, 0);
$pdf->Cell(47.25,5,'Deductions:', 0, 0);
$pdf->Cell(47.25,5,$deductions, 0, 1);

$pdf->Cell(47.25,5,'Paye', 0, 0);
$pdf->Cell(46,5,$emp_paye, 0, 0);
$pdf->Cell(47.25,5,'Bicycle Deductions:', 0, 0);
$pdf->Cell(47.25,5,$emp_bicycle_deduction, 0, 1);

$pdf->Cell(47.25,5,'Statutory Deduction', 0, 0);
$pdf->Cell(46,5,$emp_total_statutory_deductions, 0, 0);
$pdf->Cell(47.25,5,'', 0, 0);
$pdf->Cell(47.25,5,'', 0, 1);

$pdf->Cell(47.25,5,'Net Before Other Deductions', 0, 0);
$pdf->Cell(46,5,$net_before_deductions, 0, 0);
$pdf->Cell(47.25,5,'', 0, 0);
$pdf->Cell(47.25,5,'', 0, 1);

$pdf->setFillColor(216,233,237); 
$pdf->Cell(47.25,5,'Net Pay', 0, 0,'L',1);
$pdf->Cell(46,5,$emp_net_salary, 0, 0,'L',1);
$pdf->Cell(47.25,5,'Total Debt', 0, 0,'L',1);
$pdf->Cell(47.25,5,$total_debt, 0, 1,'L',1);

$pdf->Cell(47.25,5,'', 0, 0);
$pdf->Cell(46,5,'', 0, 0);
$pdf->Cell(47.25,5,'Balance Outstanding', 0, 0,'L',1);
$pdf->Cell(47.25,5,$bal_outstanding, 0, 1,'L',1);

$pdf->Cell(47.25,5,'', 0, 0);
$pdf->Cell(46,5,'', 0, 0);
$pdf->Cell(47.25,5,'Total Deductions', 0, 0,'L',1);
$pdf->Cell(47.25,5,$total_deductions, 0, 1,'L',1);

$pdf->Cell(47.25,5,'', 0, 0);
$pdf->Cell(46,5,'', 0, 0);
$pdf->Cell(47.25,5,'Net Salary Payable', 0, 0,'L',1);
$pdf->Cell(47.25,5,$empnet_salary_payable, 0, 1,'L',1);

$pdf->Line(9.2, 110.7, 198.5, 110.7);


$pdf->Line(9.2, 115, 198.5, 115);
$pdf->Line(103, 49.5, 103, 110.7);

$pdf->setFillColor(216,233,237); 
$pdf->Line(198.5, 130, 198.5, 115);
$pdf->Cell(198.5,5.5,'', 0, 1);
$pdf->Cell(187.5,5,'Net Pay Distribution', 0, 1,'L',1);

$pdf->Cell(27.5,5,'Payment Method', 0, 0);
//$pdf->Cell(47.5,5,'Bank Name', 0, 0, 'C');
$pdf->Cell(47.25,5,'Bank branch', 0, 0,'C');
$pdf->Cell(49.5,5,'Bank Number', 0, 0,'C');
//$pdf->Cell(37.8,5,'Description', 0, 0);
$pdf->Cell(47.25,5,'Paid Amount', 0, 1,'C');

$pdf->SetFont('TwCenMT','',8);
$pdf->Cell(27.5,5,$payment_method, 0, 0);
//$pdf->Cell(47.5,5,$emp_bank_no, 0, 0,'C');
$pdf->Cell(47.25,5,$emp_bank_branch, 0, 0,'C');
$pdf->Cell(49.5,5,$emp_bank_no, 0, 0,'C');
    //$pdf->Cell(37.8,5,'Penalty', 0, 0);
$pdf->Cell(47.25,5,$empnet_salary_payable, 0, 1,'C');

$pdf->Line(9.2, 130, 198.5, 130);
$pdf->Line(9.2, 130, 9.2, 115);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
 
$pdf->Cell(129	,5,'',0,0);//end of line
$pdf->Cell(20	,3,'................................................................',0,1);
$pdf->Cell(189	,3,'',0,1);//end of line
$pdf->Cell(139,3,'',0,0);//end of line
$pdf->Cell(10,3,'Approved By CEO',0,1);

$pdf->Output();
}else{
    echo "not set";
}

?>
