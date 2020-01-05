<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['deducID']) && isset($_POST['empID'])){
    
    $deducID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['deducID'])));
    $empD = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empID'])));
    
    $stm = mysqli_query($vSky, "SELECT `emp_id` FROM `employees` WHERE `emp_id`='$empD' LIMIT 1");
    $stmCount = mysqli_num_rows($stm);
    
    if($stmCount == 1){
        $stmt = mysqli_query($vSky, "SELECT de.`deduc_id` , emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, de.`deduc_date`, deb.*,
        cat.`cat_name` FROM `deduct_date_deduct` AS de 
        INNER JOIN `debts_loans /_surcharges _deductions` AS deb ON de.`emp_id`=deb.`emp_id`
        INNER JOIN `employees` AS emp ON emp.`emp_id`=deb.`emp_id`
        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
        WHERE de.`deduc_id`='$deducID' AND de.`emp_id`='$empD' AND emp.`is_pending`='0' 
        AND emp.`on_leave`='0' AND emp.`sacked`='0' LIMIT 1"); 
        
        while($vSkyRow = mysqli_fetch_assoc($stmt)){
            $data['deduc_id'] = $vSkyRow['deduc_id'];
            $data['emp_id'] = $vSkyRow['emp_id'];
            $data['emp_name'] = $vSkyRow['emp_name'];
            $data['cat_name'] = $vSkyRow['cat_name'];
            $data['emp_ssnit'] = $vSkyRow['emp_ssnit'];
            $data['deduc_date'] = $vSkyRow['deduc_date'];
            $data['debt_bal_b_d'] = $vSkyRow['debt_bal_b/d'];
            $data['current_loans_surcharges'] = $vSkyRow['current_loans/surcharges'];
            $data['total_debt'] = $vSkyRow['total_debt'];
            $data['deductions'] = $vSkyRow['deductions'];
            $data['bal_outstanding'] = $vSkyRow['bal_outstanding'];
            $data['vSkySuc'] = true;
        }

    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}


if( isset($_POST['dungotey']) ){
    $empD = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['dungotey'])));
    $curlDate = date("Y-m-d");
    
    $stm = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, cat.`cat_name`, emp.`emp_ssnit` FROM `employees` AS emp
                                    INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                                    WHERE `emp_id`='$empD' LIMIT 1");    
        
        if($vSkyRow = mysqli_fetch_assoc($stm)){
            $data['emp_id'] = $vSkyRow['emp_id'];
            $data['emp_name'] = $vSkyRow['emp_name'];
            $data['cat_name'] = $vSkyRow['cat_name'];
            $data['emp_ssnit'] = $vSkyRow['emp_ssnit'];
            $data['date'] = $curlDate;
        }
    
    if($stm){
            $data['vSkySuc'] = true;
    }else{
            $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}


if( isset($_POST['dung']) ){
    $empD = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['dung'])));
    
    $stm = mysqli_query($vSky, "SELECT emp.emp_name, debt_sur.emp_id, debt_sur.`debt_surcharges`, debt_sur.`other_deduc`,                                           debt_sur.`input_date`, emp.`emp_ssnit`, debt_sur.comments FROM `debt_surcharges` AS debt_sur
                                    INNER JOIN `employees` as emp ON emp.`emp_id`=debt_sur.`emp_id`
                                    WHERE debt_sur.`id`='$empD' LIMIT 1");    
        
        if($vSkyRow = mysqli_fetch_assoc($stm)){
            $data['emp_id'] = $vSkyRow['emp_id'];
            $data['emp_name'] = $vSkyRow['emp_name'];
            $data['eCmpCurLoanSur'] = $vSkyRow['debt_surcharges'];
            $data['cComment'] = $vSkyRow['comments'];
            $data['emp_ssnit'] = $vSkyRow['emp_ssnit'];
            $data['eCmpPDate'] = $vSkyRow['input_date'];
            $data['od_Cchrg'] = $vSkyRow['other_deduc'];
        }

    if($stm){
            $data['vSkySuc'] = true;
    }else{
            $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['prs'])){
    
    $geneprs= mysqli_real_escape_string($vSky, trim(strip_tags($_POST['prs'])));
    $geneEmpID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['geneEmpID'])));
    $eAmpName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eAmpName'])));
    $eAmpPDate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eAmpPDate'])));
    $eAmpSsnit = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eAmpSsnit'])));
    $eAmpCatName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eAmpCatName'])));
    $eAmpCurLoanSur = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eAmpCurLoanSur'])));
    $od_chrg = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['od_chrg'])));
    $comment = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['comment'])));
    
    if($geneprs == "add_charges"){
        
        $chkEmp = mysqli_query($vSky, "SELECT * FROM `employees` WHERE emp_id='$geneEmpID' LIMIT 1");
        $countEmps = mysqli_num_rows($chkEmp);
        
        if($countEmps == 1){
            
        $stmt = mysqli_query($vSky, "INSERT INTO `debt_surcharges`(`emp_id`, `debt_surcharges`, `other_deduc`, `comments`, `input_date`) VALUES ('".$geneEmpID."','".$eAmpCurLoanSur."','".$od_chrg."','".$comment."','".$eAmpPDate."')");
            
            if($stmt){
            $data['vSkySuc'] = true;
            }else{
            $data['vSkySuc'] = false;
            }
            
        }else{
            $data['emp_not_found'] = "emp_not_found";
            $data['vSkySuc'] = false;
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['del'])){
    $vSkyDelId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['chkchkchkID'])));

        $chkEmp = mysqli_query($vSky, "SELECT * FROM `employees` WHERE emp_id='$vSkyDelId' LIMIT 1");
        $countEmps = mysqli_num_rows($chkEmp);
    
    if($countEmps == 1){
        $stmt = mysqli_query($vSky,"DELETE FROM `debt_surcharges` WHERE `debt_surcharges`.`id` = '$vSkyDelId'");
        
        if($stmt){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
    }else{
            $data['err_emp'] = 'emp_nt_found';
            $data['vSkySuc'] = false;
    }
    
    echo json_encode($data);
    exit();
}
?>