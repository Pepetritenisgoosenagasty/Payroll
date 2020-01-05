<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
require_once 'Classes/PHPExcel.php';
error_reporting(1);
//we can combine this with file upload
//if( empty($_FILES) ){
//	echo "
//		<form method='post' enctype='multipart/form-data' action='function_excel_dump.php'>
//			<input type='file' name='excel'>
//			<br>
//			<button type='submit'>Fetch</button>
//		</form>
//	";
//}else{

	//load excel file using PHPExcel's IOFactory
	//change filename to tmp_name of uploaded file
	$excel = PHPExcel_IOFactory::load('excel_emp.xlsx');

	//set active sheet to first sheet
	$excel->setActiveSheetIndex(1);

//	echo "<table border=1>";
//        echo "<tr>";
//        echo     "<th>A</th>";
//        echo     "<th>B</th>";
//        echo     "<th>C</th>";
//        echo     "<th>D</th>";
//        echo     "<th>E</th>";
//        echo     "<th>F</th>";
//        echo     "<th>G</th>";
//        echo     "<th>H</th>";
//        echo     "<th>I</th>";
//        echo     "<th>J</th>";
//        echo     "<th>K</th>";
//        echo     "<th>L</th>";
//        echo     "<th>M</th>";
//        echo     "<th>N</th>";
//        echo     "<th>O</th>";
//        echo     "<th>P</th>";
//        echo     "<th>Q</th>";
//        echo     "<th>R</th>";
//        echo     "<th>S</th>";
//        echo     "<th>T</th>";
//        echo     "<th>U</th>";
//        echo     "<th>V</th>";
//        echo     "<th>W</th>";
//        echo     "<th>X</th>";
//      echo  " </tr>";

	//first row of data series
	$i = 5;
    $inputDate = date("Y-m-d");

	//loop until the end of data series(cell contains empty string)
	//loop until the end of data series(cell contains empty string)
	while( $excel->getActiveSheet()->getCell('A'.$i)->getValue() != ""){
		//get cells value
		$id = $excel->getActiveSheet()->getCell('A'.$i)->getValue();
		$name =	$excel->getActiveSheet()->getCell('B'.$i)->getValue();
		$ssnit = $excel->getActiveSheet()->getCell('C'.$i)->getValue();
		$bankAcc =	$excel->getActiveSheet()->getCell('D'.$i)->getValue();
		$bankBranch = $excel->getActiveSheet()->getCell('E'.$i)->getValue();
		$department = $excel->getActiveSheet()->getCell('F'.$i)->getValue();
		$position =	$excel->getActiveSheet()->getCell('G'.$i)->getValue();
		$basic = $excel->getActiveSheet()->getCell('H'.$i)->getValue();
		$employer = $excel->getActiveSheet()->getCell('I'.$i)->getValue();
		$employee = $excel->getActiveSheet()->getCell('J'.$i)->getValue();
		$taxable_salary = $excel->getActiveSheet()->getCell('K'.$i)->getValue();
		$paye =	$excel->getActiveSheet()->getCell('L'.$i)->getValue();
		$statutory_deductions =	$excel->getActiveSheet()->getCell('M'.$i)->getValue();
		$net_salary_before_other_deductions = $excel->getActiveSheet()->getCell('N'.$i)->getValue();
		$debt_bal_b_d =	$excel->getActiveSheet()->getCell('O'.$i)->getValue();
		$current_loan_surcharges = $excel->getActiveSheet()->getCell('P'.$i)->getValue();
		$total_debt = $excel->getActiveSheet()->getCell('Q'.$i)->getValue();
		$noName = $excel->getActiveSheet()->getCell('R'.$i)->getValue();
		$deductions = $excel->getActiveSheet()->getCell('S'.$i)->getValue();
		$balance_Outstanding = $excel->getActiveSheet()->getCell('T'.$i)->getValue();
		$total_Deductions =	$excel->getActiveSheet()->getCell('U'.$i)->getValue();
		$net_salary_payable = $excel->getActiveSheet()->getCell('V'.$i)->getValue();
		$bicycle_deductions = $excel->getActiveSheet()->getCell('W'.$i)->getValue();
		$netSalary = $excel->getActiveSheet()->getCell('X'.$i)->getValue();
		//$position =	$excel->getActiveSheet()->getCell('Y'.$i)->getValue();
		//$position =	$excel->getActiveSheet()->getCell('Z'.$i)->getValue();
		//echo
            $id;
            $name;
            $ssnit;
            $bankAcc;
            $bankBranch;
            $department;
        
            if($department == "OPERATIONS"){
                $department = 1;
            }else if($department == "ADMIN"){
                $department = 2;
            }else if($department == "GM"){
                $department = 3;
            }
            //$position;
            if($position == "ASSIST T.M"){
                $position = 1;
            }else if($position == "ADMINISTRATOR"){
                $position = 2;
            }else if($position == "SECRETARY"){
                $position = 3;
            }else if($position == "CFO"){
                $position = 4;
            }else if($position == "COUNSEL"){
                $position = 5;
            }else if($position == "TRANSPORT M."){
                $position = 6;
            }else if($position == "SUPERVISOR"){
                $position = 7;
            }else if($position == "DEPOT REP."){
                $position = 8;
            }else if($position == "OPERATIONS M."){
                $position = 9;
            }else if($position == "GM"){
                $position = 10;
            }
        
            $basic;
            $employer = round(sprintf("%0.2f",$basic*(0/100)),2);
            $employee = round(sprintf("%0.2f",$basic*(0/100)),2);
            $taxable_salary = round(sprintf("%0.2f",$basic-($basic*(0/100))),2);
            $paye = round($paye,2);
            $statutory_deductions = round(sprintf("%0.2f",($basic*(0/100))+$paye),2);
            $net_salary_before_other_deductions = round(sprintf("%0.2f",$basic-( ($basic*(0/100))+ $paye )),2);
            $debt_bal_b_d;
            $current_loan_surcharges;
            $total_debt = round(sprintf("%0.2f",$debt_bal_b_d+$current_loan_surcharges),2);
            $noName;
            $deductions;
            $balance_Outstanding = round(sprintf("%0.2f",($debt_bal_b_d+$current_loan_surcharges)-$deductions),2);
            $total_Deductions = round(sprintf("%0.2f",($basic*(0/100))+($paye)+($deductions)),2);
            $net_salary_payable = round(sprintf("%0.2f",(($basic-($basic*(0/100)))-(($basic*(0/100))+($paye)+($deductions)))),2);
            $bicycle_deductions;
            $netSalary = round(sprintf("%0.2f",((($basic-($basic*(0/100)))-(($basic*(0/100))+($paye)+($deductions)))-($bicycle_deductions))),2);
        
       $query = mysqli_query($vSky, "UPDATE `employees` SET `emp_pos_id`='$position',`emp_dept_id`='$department',`emp_main_cat_id`='1',`ssf_id`='1',`last_update`='$inputDate',`is_pending`='0' WHERE `emp_name`='$name'");
        
        "UPDATE `payroll_store` SET `net_before_deductions`='$net_salary_before_other_deductions'"
		
		//and DON'T FORGET to increment the row pointer ($i)
		$i++;
	}
        if($query){
        echo "done";
        }else{
        echo "error ".mysqli_error($vSky);
        }

//	echo "</table>";
//	
//}