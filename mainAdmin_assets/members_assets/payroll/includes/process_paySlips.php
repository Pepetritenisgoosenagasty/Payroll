<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['selVal'])){
    
    $cat_di = mysqli_real_escape_string($vSky, $_POST['selVal']);
    
    $quey = mysqli_query($vSky, "SELECT * FROM `main_category` AS cat 
                                INNER JOIN `employees` AS emp ON emp.`emp_main_cat_id`=cat.`cat_id` 
                                WHERE cat.`cat_id`='$cat_di'");
    
    while($getvals = mysqli_fetch_assoc($quey)){
        $cat_na = $getvals['cat_name'];
    }
    
    $getCount = mysqli_num_rows($quey);
    
    if($quey){
        $data['count'] = $getCount;
        $data['cat_na'] = $cat_na;
        $data['cat_idsd'] = $cat_di;
    }else{
        $data['vSkyErr'] = "err";
    }

    echo json_encode($data);
    exit();
}

if(isset($_POST['chkchkchkID']) && isset($_POST['del'])){

    $ids = mysqli_real_escape_string($vSky, $_POST['chkchkchkID']);
    $process = mysqli_real_escape_string($vSky, $_POST['del']);
    $chkchkcat_id = mysqli_real_escape_string($vSky, $_POST['chkchkcat_id']);
    
    if($process == "del"){
        
        $query_2 = mysqli_query($vSky, "SELECT `emp_id` FROM `payroll_next_pay` WHERE `emp_id`='$ids'");
        $count_emps = mysqli_num_rows($query_2);
        
        if($count_emps == 1){
        $query = mysqli_query($vSky, "DELETE FROM `payroll_next_pay` WHERE `emp_id`='$ids'");
            if($query){
                $data['vSkySuc'] = true;
                $data['cat_id'] = $chkchkcat_id;
            }else{
                $data['vSkySuc'] = false;
            }
            
        }else{
            $data['not_found'] = "not_found"; 
        }
        
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['post_all']) && isset($_POST['post_all_chk'])){
    
  foreach($_POST['post_all_chk'] as $indexId => $indexVal){
      
        $post_ids = mysqli_real_escape_string($vSky, $indexVal);
        
        $del_query = mysqli_query($vSky, "DELETE FROM `payroll_store` WHERE `id`='$post_ids'");

        }
    
    if($del_query){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
    }

if(isset($_POST['indate'])){
    $indate = $_POST['indate'];
    
    if($indate == "dueDatesss"){
        $stmt = mysqli_query($vSky, "SELECT * FROM `payroll_date` WHERE active ='1' LIMIT 1");
        $count = mysqli_num_rows($stmt);
        
        if($count == 1){
                        
        $stmt = mysqli_query($vSky, "SELECT * FROM `payroll_date` WHERE active ='1' LIMIT 1");
            
            while($vSkyRow = mysqli_fetch_array($stmt)){
                
            $id = $vSkyRow['id'];
            $dateIn = $vSkyRow['input_date'];
            $data['indates'] = $vSkyRow['input_date'];
            $auto_man = $vSkyRow['auto_man'];
                
            }
            
            if($auto_man == 0){
                
            $data['never'] = "never";
            $data['vSkySuc'] = true;
                
            }else if($auto_man == 1){
                
            $data['manual'] = "manual";
            $data['vSkySuc'] = true;
                
            }else if($auto_man == 2){
                
            $data['daily'] = "daily";
            $data['vSkySuc'] = true;
                
            }else if($auto_man == 3){
                
            $data['weekly'] = "weekly";
            $data['vSkySuc'] = true;
                
            }
            
        }else{
            $data['vSkySuc'] = false;
        }
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['idsnowNow']) && isset($_POST['cat_ids_now'])){
    
    $c_id = $_POST['idsnowNow'];
    $catog_id = $_POST['cat_ids_now'];
    $datePay = date("Y-m-d");
    $update_vals = array();
    $deduc_ids = array();
    
             foreach($c_id as $updatess){
                
            $query_try = mysqli_query($vSky, "INSERT INTO `debts_loans /_surcharges _deductions`(`emp_id`, `debt_bal_b/d`, `current_loans/surcharges`, `total_debt`,  `deductions`, `bal_outstanding`, `total_deductions`, `input_date`, `updatee_date`, `comments`) 
            VALUES ( '".$updatess['emp_ids']."', '".$updatess['debt_bal_b/d']."', '".$updatess['current_loans/surcharges']."', '".$updatess['total_debt']."', '".$updatess['deductions']."', '".$updatess['bal_outstanding']."', '".$updatess['total_deductions']."', '".$updatess['input_date']."', '".$updatess['updatee_date']."', '".$updatess['comments']."')");
                
            $update_vals = mysqli_insert_id($vSky);
            $deduc_ids[] = array("deducs" => $update_vals, "emp_ids" => $updatess['emp_ids']);

         }
    
            if($query_try){
            
            foreach($deduc_ids as $vals_ids){
                
            $query8 = mysqli_query($vSky, "SELECT * FROM `deduct_date_deduct` WHERE `emp_id`='".$vals_ids['emp_ids']."' LIMIT 1");
            $count9 = mysqli_num_rows($query8);
                if($count9 == 1){
                    $query_taec = mysqli_query($vSky, "UPDATE `deduct_date_deduct` SET `deduc_id`='".$vals_ids['deducs']."',`deduc_date`='$datePay',`last_deduct_date`='$datePay' WHERE `emp_id`='".$vals_ids['emp_ids']."'");
                }
                
            }            
        }
    
    if($query_taec){
        $data['vSkySuc'] = true;
        $data['cat_id'] = $catog_id;
    }else{
        $data['vSkySuc'] = false;
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['idsUpdate'])){
    
    $idsUPdate = $_POST['idsUpdate'];
    $for_debts = $_POST['for_debts'];
    $datePay = date("Y-m-d");
    $pro = 1;
        
            foreach($idsUPdate as $is){
                
                $query = mysqli_query($vSky, "SELECT * FROM `pay_dates_pay` WHERE `emp_id`='".$is['emp_ids']."' LIMIT 1");
                $count = mysqli_num_rows($query);
                
    if($count == 1){
        $update = mysqli_query($vSky, "UPDATE `pay_dates_pay` SET `payroll_lastPayId`='".$is['update_ids']."',`pay_date`='$datePay',`last_payDate`='$datePay' WHERE `emp_id`='".$is['emp_ids']."'"); 
        }       
     }
    
    if($update){
        $query_last = mysqli_query($vSky, "TRUNCATE `payroll_next_pay`");
        if($query_last){
            
        $data['vSkySuc'] = true;
        $data['cat_id'] = $pro;
        $data['debts'] = $for_debts;
            
        }
    }else{
        
        $data['vSkySuc'] = false;
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['getIdsAl'])){
    
    $getIds = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['getIdsAl'])));
    $totSurchrg = 0;
    $datee = date("Y-m-d");
    
    $query1 = mysqli_query($vSky, "SELECT * FROM `ssf` WHERE `active`='1' LIMIT 1");
    if($obt = mysqli_fetch_assoc($query1)){
        $empPercnt = $obt['employee_%'];
        $emplerPercnt = $obt['employer_%'];
    }
    
    $query = mysqli_query($vSky ,"SELECT emp.`emp_id`, emp.`emp_ssnit`, emp.`emp_name`, emp.`emp_dept_id`, emp.`emp_main_cat_id`, emp.`emp_pos_id`, emp.`emp_bank_branch`, emp.`emp_bank_account_no`, pay.*, dat.*, cat.*, pos.*, dept.* FROM `employees` AS emp 
                    INNER JOIN `department` AS dept ON dept.`id`=emp.`emp_dept_id`
                    INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                    INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                    INNER JOIN `payroll_store` AS pay ON  pay.`emp_id`=emp.`emp_id`
                    INNER JOIN `pay_dates_pay` AS dat ON dat.`payroll_lastPayId`= pay.`id`
                    WHERE emp.`emp_id`='$getIds'");
    
    $count_emps = mysqli_num_rows($query);
    
    if($count_emps == 1){
        
            $query = mysqli_query($vSky ,"SELECT emp.`emp_id`, emp.`emp_ssnit`, emp.`emp_name`, emp.`emp_dept_id`, emp.`emp_main_cat_id`, emp.`emp_pos_id`, emp.`emp_bank_branch`, emp.`emp_bank_account_no`, pay.*, dat.*, cat.*, pos.*, dept.* FROM `employees` AS emp 
                    INNER JOIN `department` AS dept ON dept.`id`=emp.`emp_dept_id`
                    INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                    INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                    INNER JOIN `payroll_store` AS pay ON  pay.`emp_id`=emp.`emp_id`
                    INNER JOIN `pay_dates_pay` AS dat ON dat.`payroll_lastPayId`= pay.`id`
                    WHERE emp.`emp_id`='$getIds'");
        
           while($fetch = mysqli_fetch_assoc($query)){
        $payEmpDeptID = $fetch['emp_dept_id'];
        $payEmpPosID = $fetch['emp_pos_id'];
        $payEmpCatID= $fetch['emp_main_cat_id'];
        $payEmpID = $fetch['emp_id'];
        $payEmpName = $fetch['emp_name'];
        $payEmpDebtBal = $fetch['debt_bal_b/d'];
        $payEmpBasicPay = $fetch['basic_pay'];
        $payEmpDeduct = $fetch['deductions'];
        $payEmpBlaAwt = $fetch['bal_outstanding'];
        $payEmpTotDeduc = $fetch['total_deductions'];
        $payEmpTotDebt = $fetch['total_debt'];
        $payEmpPayMethod = $fetch['payment_method'];
        $payEmpBankBranch = $fetch['emp_bank_branch'];
        $payEmpBankNo = $fetch['emp_bank_account_no'];
        $payEmpSSNIT= $fetch['emp_ssnit'];
        $payEmpcomment = $fetch['comment'];
        $payEmpempBicycleDeduction = $fetch['emp_bicycle_deduction'];
        $payEmpCatName = $fetch['cat_name'];
        
        $run_query = mysqli_query($vSky, "SELECT * FROM `debt_surcharges` WHERE `emp_id`='$payEmpID'");
        while($get = mysqli_fetch_assoc($run_query)){
            $totSurchrg += $get['debt_surcharges'];
        }
        
    }
    $data['vSkySuc'] = true;
    $data['vSkyTDbTID'] = $payEmpID;
    $data['vSkyTDbName'] = $payEmpName;
    $data['vSkyTDbDate'] = $datee;
    $data['vSkyTDbbankNo'] =$payEmpBankNo ;
    $data['vSkyTDbbankBranch'] = $payEmpBankBranch;
    $data['vSkyTDbSsint'] = $payEmpSSNIT;
    $data['vSkyTDbConmments'] = $payEmpcomment;
    $data['payEmpCatName'] = $payEmpCatName;
    $data['vSkyTDbPosId'] = $payEmpPosID;
    $data['vSkyTDbDeptId'] = $payEmpDeptID;
    $data['vSkyTDbMainCatId'] = $payEmpCatID;
    $data['vSkyTDbBasic'] = $payEmpBasicPay;
    $data['vSkyTDCurLoanSurCharges'] = $totSurchrg;
    $data['vSkyTDbBicycleDuc'] = $payEmpempBicycleDeduction;
    $data['vSkyTDbDebtBal'] = $payEmpDebtBal;
    $data['vSkyTDbPaymentsMethod'] = $payEmpPayMethod;
    $data['vSkyTDbTotDebt'] = $payEmpTotDebt;
    $data['vSkyTDbDuction'] = $payEmpDeduct;
    $data['vSkyTDbBalanceAwt'] = $payEmpBlaAwt;
    $data['vSkyTDbTotDuc'] = $payEmpTotDeduc;
    $data['vSkyEmpPercnt'] = $empPercnt;
    $data['vSkyEmplerPercnt'] = $emplerPercnt;
        
    }else{
        
        $data['not_on_payroll'] = "not_on_payroll";
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['save_single']) && !empty($_POST['save_single'])){
    
    if($_POST['save_single'] == "save_single"){
                $payEmpDeptID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpDeptID'])));
                $payEmpPosID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpPosID'])));
                $payEmpCatID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpCatID'])));
                $payEmpID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpID'])));
                $payEmpbasic = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpbasic'])));
                $payEmpDebtBal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpDebtBal'])));
                $payEmpSSFl = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpSSFl'])));
                $payEmpCurLoanSur = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpCurLoanSur'])));
                $payEmpSSFP = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpSSFP'])));
                $payEmpAdjust = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpAdjust'])));
                $payEmpTaxableS = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpTaxableS'])));
                $payEmpDeduct = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpDeduct'])));
                $payEmpPaye = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpPaye'])));
                $payEmpBicyc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpBicyc'])));
                $payEmpStatuDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpStatuDeduc'])));
                $payEmpBeforOdaDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpBeforOdaDeduc'])));
                $payEmpNetSal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpNetSal'])));
                $payEmpTotDebt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpTotDebt'])));
                $payEmpBlaAwt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpBlaAwt'])));
                $payEmpTotDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpTotDeduc'])));
                $payEmpNetSalPay = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpNetSalPay'])));
                $payEmpPayMethod = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpPayMethod'])));
                $payEmpDescrp = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpDescrp'])));
                $payEmpComment = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['payTOEmpComment'])));
                $inpdate = date("Y-m-d");
                
            $query = mysqli_query($vSky, "SELECT * FROM `employees` WHERE `emp_id`='$payEmpID' ");
            $find = mysqli_num_rows($query);
        if($find == 1){
            $queryIn = mysqli_query($vSky, "INSERT INTO 
            `payroll_next_pay`(`emp_id`, `date_stored`, `basic_pay`, `emp_taxable_salary`, `emp_paye`, `emp_total_statutory_deductions`, `net_before_deductions`, `emp_net_salary`, `emp_bicycle_deduction`, `empnet_salary_payable`, `employee_ssf`, `employer_ssf`, `debt_bal_b/d`, `current_loans/surcharges`, `total_debt`, `adjustments`, `deductions`, `bal_outstanding`, `total_deductions`, `payment_method`, `updatee_date`, `description`, `comments`) 
            VALUES ('".$payEmpID."', '".$inpdate."', '".$payEmpbasic."', '".$payEmpTaxableS."', '".$payEmpPaye."', '".$payEmpStatuDeduc."', '".$payEmpBeforOdaDeduc."', '".$payEmpNetSal."', '".$payEmpBicyc."', '".$payEmpNetSalPay."', '".$payEmpSSFP."', '".$payEmpSSFl."', '".$payEmpDebtBal."', '".$payEmpCurLoanSur."', '".$payEmpTotDebt."', '".$payEmpAdjust."', '".$payEmpDeduct."', '".$payEmpBlaAwt."', '".$payEmpTotDeduc."', '".$payEmpPayMethod."', '".$inpdate."', '".$payEmpDescrp."', '".$payEmpComment."')");
            
            if($queryIn){
                $data['vSkySuc'] = true;
                $data['cat_id'] = $payEmpCatID;
            }else{
                $data['vSkySuc'] = false.mysqli_error($vSky);
            }
        }
            echo json_encode($data);
            exit();
    }

}

if(isset($_POST['preedit']) && !empty($_POST['preedit'])){
    
    $preedit = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['preedit'])));
    
    if($preedit == "updatePrePost"){
        
        $eempDeptID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempDeptID'])));
        $eempPosID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempPosID'])));
        $eempCatID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempCatID'])));
        $eempID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempID'])));
        $eempName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempName'])));
        $eempPDate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempPDate'])));
        $eempSsnit = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempSsnit'])));
        $eempCatName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempCatName'])));
        $eempBasic = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempbasic'])));
        $eempDebtBal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempDebtBal'])));
        $eempSSFl = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempSSFl'])));
        $eempCurLoanSur = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempCurLoanSur'])));
        $eempSSFP = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempSSFP'])));
        $eempAdjust = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempAdjust'])));
        $eempTaxableS = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempTaxableS'])));
        $eempDeduct = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempDeduct'])));
        $eempPaye = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempPaye'])));
        $eempBicyc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempBicyc'])));
        $eempStatuDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempStatuDeduc'])));
        $eempBeforOdaDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempBeforOdaDeduc'])));
        $eempNetSal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempNetSal'])));
        $eempTotDebt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempTotDebt'])));
        $eempBlaAwt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempBlaAwt'])));
        $eempTotDeduc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempTotDeduc'])));
        $eempNetSalPay = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempNetSalPay'])));
        $eempPayMethod = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempPayMethod'])));
        $eempDescrp = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempDescrp'])));
        $eempPaidAmt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempPaidAmt'])));
        $eempcomment = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['eempcomment'])));
        $updateDate = date("Y-m-d");
        
        $query = mysqli_query($vSky, "SELECT `emp_id` FROM `employees` WHERE `emp_id`='$eempID' AND `emp_main_cat_id`='$eempCatID' LIMIT 1");
        $countEdit = mysqli_num_rows($query);
        
        if($countEdit == 1){
            
            $query_2 = mysqli_query($vSky, "SELECT `emp_id` FROM `payroll_next_pay` WHERE `emp_id`='$eempID' LIMIT 1");
            $countPre = mysqli_num_rows($query_2);
            
            if($countPre == 1){
                
                $queryNow = mysqli_query($vSky, "UPDATE `payroll_next_pay` SET `basic_pay`='$eempBasic', `emp_taxable_salary`='$eempTaxableS', `emp_paye`='$eempPaye', `emp_total_statutory_deductions`='$eempStatuDeduc', `net_before_deductions`='$eempBeforOdaDeduc', `emp_net_salary`='$eempNetSal',`emp_bicycle_deduction`='$eempBicyc', `empnet_salary_payable`='$eempNetSalPay', `employee_ssf`='$eempSSFP', `employer_ssf`='$eempSSFl', `debt_bal_b/d`='$eempDebtBal', `current_loans/surcharges`='$eempCurLoanSur', `total_debt`='$eempTotDebt', `adjustments`='$eempAdjust', `deductions`='$eempDeduct', `bal_outstanding`='$eempBlaAwt', `total_deductions`='$eempTotDeduc', `payment_method`='$eempPayMethod',`updatee_date`='$updateDate', `description`='$eempDescrp', `comments`='$eempcomment' WHERE emp_id='$eempID'");
                
                if($queryNow){
                    
                    $data['vSkySuc'] = true;
                    $data['cat_id'] = $eempCatID;
                    $data['emp_id'] = $eempID;
                    
                }else{
                    
                    $data['vSkySuc'] = false;
                    
                }
            }
            
        }
        
        echo json_encode($data);
        exit();
        
    }
}

if(isset($_POST['chk_avail'])){
          $chk_query = mysqli_query($vSky, "SELECT * FROM `payroll_next_pay`");
        
        $chk_count = mysqli_num_rows($chk_query);
        
        if($chk_count > 0){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
    echo json_encode($data);
    exit();
}

if(isset($_POST['action'])){
    
    if($_POST['action']  == "proceed_generation"){
        
        
        $query_getIds = mysqli_query($vSky, "SELECT `emp_id` FROM `employees`");
        $for_update_id = array();
        $emp_idsds = array();
        $for_debts = array();
        
        while($fetch = mysqli_fetch_assoc($query_getIds)){
            $emp_IDD = $fetch['emp_id'];
            
            $query_7 = mysqli_query($vSky, "SELECT * FROM `payroll_next_pay` WHERE `emp_id`='$emp_IDD'");
            
            while($getting = mysqli_fetch_assoc($query_7)){
                            $vSkyEmpBDempId  =  $getting['emp_id'];
                            $vSkyEmpBDempDate  =  $getting['date_stored'];
                            $vSkyEmpBDempbasic  =  $getting['basic_pay'];
                            $vSkyEmpBDempgross  =  $getting['emp_gross_salary'];
                            $vSkyEmpBDempTaxable  =  $getting['emp_taxable_salary'];
                            $vSkyEmpBDempPaye  =  $getting['emp_paye'];
                            $vSkyEmpBDempStatDeduc  =  $getting['emp_total_statutory_deductions'];
                            $vSkyEmpBDempbeforeDeductions  =  $getting['net_before_deductions'];
                            $vSkyEmpBDempNetSalary  =  $getting['emp_net_salary'];
                            $vSkyEmpBDempBiDeductions  =  $getting['emp_bicycle_deduction'];
                            $vSkyEmpBDempNePayable  =  $getting['empnet_salary_payable'];
                            $vSkyEmpBDempSSF  =  $getting['employee_ssf'];
                            $vSkyEmpBDemplerSSF  =  $getting['employer_ssf'];
                            $vSkyEmpBDempDebtBalance  =  $getting['debt_bal_b/d'];
                            $vSkyEmpBDempSurCharges  =  $getting['current_loans/surcharges'];
                            $vSkyEmpBDempTotalDebt  =  $getting['total_debt'];
                            $vSkyEmpBDempDeductions  =  $getting['deductions'];
                            $vSkyEmpBDempBalanceAWT  =  $getting['bal_outstanding'];
                            $vSkyEmpBDemTotalDeductions  =  $getting['total_deductions'];
                            $vSkyEmpBDempPaymentMode  =  $getting['payment_method'];
                            $vSkyEmpBDempdescription  =  $getting['description'];
                            $vSkyEmpBDempcomments  =  $getting['comments'];
                            $vSkyEmpBDempUpdateDate  =  $getting['updatee_date'];
                
                $queryOdIn = mysqli_query($vSky, "INSERT INTO `payroll_store`(`emp_id`, `date_stored`, `basic_pay`, `emp_gross_salary`, `emp_taxable_salary`, `emp_paye`, `emp_total_statutory_deductions`, `net_before_deductions`, `emp_net_salary`, `emp_bicycle_deduction`, `empnet_salary_payable`, `employee_ssf`, `employer_ssf`, `debt_bal_b/d`, `current_loans/surcharges`, `total_debt`, `deductions`, `bal_outstanding`, `total_deductions`, `payment_method`, `description`, `comment`, `updatee_date`, `ready_for_printing`) VALUES ('".$vSkyEmpBDempId."', '".$vSkyEmpBDempDate."', '".$vSkyEmpBDempbasic."', '".$vSkyEmpBDempgross."', '".$vSkyEmpBDempTaxable."', '".$vSkyEmpBDempPaye."', '".$vSkyEmpBDempStatDeduc."',   '".$vSkyEmpBDempbeforeDeductions."', '".$vSkyEmpBDempNetSalary."', '".$vSkyEmpBDempBiDeductions."', '".$vSkyEmpBDempNePayable."', '".$vSkyEmpBDempSSF."', '".$vSkyEmpBDemplerSSF."', '".$vSkyEmpBDempDebtBalance."', '".$vSkyEmpBDempSurCharges."', '".$vSkyEmpBDempTotalDebt."', '".$vSkyEmpBDempDeductions."', '".$vSkyEmpBDempBalanceAWT."', '".$vSkyEmpBDemTotalDeductions."', '".$vSkyEmpBDempPaymentMode."', '".$vSkyEmpBDempdescription."', '".$vSkyEmpBDempcomments."', '".$vSkyEmpBDempUpdateDate."', '1')");
                     $inidd = mysqli_insert_id($vSky);
                    $for_update_id[] = array("update_ids" => $inidd, "emp_ids" => $vSkyEmpBDempId);
                
                    $for_debts[] = array("emp_ids" => $vSkyEmpBDempId, "debt_bal_b/d" => $vSkyEmpBDempDebtBalance, "current_loans/surcharges" => $vSkyEmpBDempSurCharges, "total_debt" => $vSkyEmpBDempTotalDebt,  "deductions" => $vSkyEmpBDempDeductions, "bal_outstanding" => $vSkyEmpBDempBalanceAWT, "total_deductions" => $vSkyEmpBDemTotalDeductions, "input_date" => $vSkyEmpBDempUpdateDate, "updatee_date" => $vSkyEmpBDempUpdateDate, "comments" => $vSkyEmpBDempcomments,);
            }
            
        }
        
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    
    $data['idsUpdate'] = $for_update_id;
    $data['for_debts'] = $for_debts;
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['cat_id_id'])){
    $cat_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['cat_id_id'])));
    $i = 0;
    $query = mysqli_query($vSky, "SElECT `emp_id` FROM `employees` WHERE is_pending='0' AND on_leave='0' AND sacked='0' AND `emp_main_cat_id`='$cat_id'");
        while($getIDDS = mysqli_fetch_assoc($query)){
            $emp_ids_got = $getIDDS['emp_id'];
            
            $query1 = mysqli_query($vSky, "SELECT `emp_id` FROM `payroll_next_pay` WHERE `emp_id`='$emp_ids_got'");
            $count = mysqli_num_rows($query1);
            if($count == 1){
                
                $data['found'] = "ignored";
                
            }else{
            
            $query2 = mysqli_query($vSky, "SELECT * FROM `payroll_store` AS py 
            INNER JOIN `pay_dates_pay` AS pd ON pd.`payroll_lastPayId`= py.`id`
            INNER JOIN `ssf` AS s
            WHERE py.`emp_id`='$emp_ids_got' AND s.`active`='1' ");

                while($vals = mysqli_fetch_assoc($query2)){
                    $basicSalary = $vals['basic_pay'];
                    $taxableSalary = $vals['emp_taxable_salary'];
                    $paye = $vals['emp_paye'];
                    $totalStatutorydeductions = $vals['emp_total_statutory_deductions'];
                    $netBeforeOtherDeductions = $vals['net_before_deductions'];
                    $netSalary = $vals['emp_net_salary'];
                    $bicycleDeductions = $vals['emp_bicycle_deduction'];
                    $netSalaryPayable = $vals['empnet_salary_payable'];
                    $employeeSFF = $vals['employee_ssf'];
                    $employerSFF = $vals['employer_ssf'];
                    $debtBalanceBD = $vals['debt_bal_b/d'];
                    $currentSurCharges = $vals['current_loans/surcharges'];
                    $totalDebts = $vals['total_debt'];
                    $deductions = $vals['deductions'];
                    $adjustments = $vals['adjustments'];
                    $balanceOutStanding = $vals['bal_outstanding'];
                    $ssfPercentageEmployee = $vals['employee_%'];
                    $ssfPercentageEmployer = $vals['employer_%'];
                    
                    $emplySSF = $basicSalary*($ssfPercentageEmployee);
                    $emplyerSSF = $basicSalary*($ssfPercentageEmployer);
                    
                    if($employeeSFF == 0){
                        $emplySSF = 0;
                    }
                    $i++;
                    
                    if(do_calcv($emplySSF, $basicSalary, $paye, $balanceOutStanding, $currentSurCharges, $deductions, $bicycleDeductions, $cat_id, $taxableSalary, $adjustments, $emplyerSSF, $vSky, $emp_ids_got)){
                        $data['vSkySuc'] = false;
                    }else{
                        $data['vSkySuc'] = true;
                    }
                }
                
            }

            
        }
    $data['cat_id'] = $cat_id;
    echo json_encode($data);
    exit();
}

if(isset($_POST['x'])){
    
    $x = $_POST['x'];
    
    $n = tax_calc($x, $vSky);
    
    $data['paye'] = round($n, 2);
    $data['vSkySuc'] = true;
    echo json_encode($data);
    exit();
 }

//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
function do_calcv($vSkyEmplerSsf, $vSkyEmpBasicSalary, $vSkyEmpPaye, $vSkyEmpDebtBalance, $vSkyEmpCurrentLoan, $vSkyEmpDeductions, $vSkyEmpBicycleDeduction, $vSkyEmpMainCatID, $taxableSalary, $vSkyeempAdjust, $vSkyEmpSsf, $vSky, $emp_ids_got) {
    $i = 0;
    $tempvSkyEmpDeductions = 0;
    $tempvSkyeempAdjust = 0;
    $iis_id = array();

    if ($vSkyeempAdjust == 0 && $vSkyEmpDeductions != 0) {

        //echo "10 ";
        $vSkyEmpDeductions = $tempvSkyeempAdjust + $vSkyEmpDeductions;


    } else if ($vSkyEmpDeductions == 0 && $vSkyeempAdjust != 0) {

     //   echo "11 ";
        $vSkyEmpDeductions = $vSkyeempAdjust + $tempvSkyEmpDeductions;

    } else if ($vSkyEmpDeductions != 0 && $vSkyeempAdjust != 0) {

        $vSkyEmpDeductions = $vSkyeempAdjust + $vSkyEmpDeductions;
       // echo "12 ";

    } else if ($vSkyEmpDeductions == 0 && $vSkyeempAdjust == 0) {


        $vSkyEmpDeductions = $tempvSkyeempAdjust + $tempvSkyEmpDeductions;
      //  echo "13 ";
    } else {

        $vSkyEmpDeductions = 0;
      //  echo "14 ";
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($vSkyEmpDebtBalance == 0 || $vSkyEmpCurrentLoan == 0) {
         $tempvSkyEmpDebtBalance = 0;
         $tempvSkyEmpCurrentLoan = 0;


        if ($vSkyEmpCurrentLoan == 0 && $vSkyEmpDebtBalance != 0) {

            $vSkyEmpTotalDebt = $vSkyEmpDebtBalance + $tempvSkyEmpCurrentLoan;

            $vSkyEmpBalanceOutStanding = ($vSkyEmpTotalDebt) - $vSkyEmpDeductions;
            
            //    echo "15 ";
        } else if ($vSkyEmpCurrentLoan == 0 && $vSkyEmpDebtBalance == 0) {

            $vSkyEmpTotalDebt = $tempvSkyEmpDebtBalance + $tempvSkyEmpCurrentLoan;
            
            $vSkyEmpBalanceOutStanding = ($vSkyEmpTotalDebt) - $vSkyEmpDeductions;

          //  echo "16 ";
        } else if ($vSkyEmpCurrentLoan != 0 && $vSkyEmpDebtBalance == 0) {

            $vSkyEmpTotalDebt = $tempvSkyEmpDebtBalance + $vSkyEmpCurrentLoan;
            
        $vSkyEmpBalanceOutStanding = ($vSkyEmpTotalDebt) - $vSkyEmpDeductions;
        //    echo "17 ";
        } else if ($vSkyEmpCurrentLoan != 0 && $vSkyEmpDebtBalance != 0) {

            $vSkyEmpTotalDebt = $vSkyEmpDebtBalance + $vSkyEmpCurrentLoan;
            
        $vSkyEmpBalanceOutStanding = ($vSkyEmpTotalDebt) - $vSkyEmpDeductions;
        //    echo "18 ";
        }


    } else {      

        $vSkyEmpTotalDebt = $vSkyEmpDebtBalance + $vSkyEmpCurrentLoan;

        $vSkyEmpBalanceOutStanding = ($vSkyEmpDebtBalance + $vSkyEmpCurrentLoan) - $vSkyEmpDeductions;
        
         //   echo "balanceOutStanding_here: ".$vSkyEmpBalanceOutStanding."   ";
        //   echo "19 ";
    }

    if ($vSkyEmpBasicSalary == 0) {
        // $vSkyEmpBasicSalary = 0;
         $tempBasic = 0;
      //  echo "never here";
        if ($vSkyEmpMainCatID == 2 || $vSkyEmpMainCatID == 4 || $vSkyEmpMainCatID == 1) {
            
            $vSkyempTaxableSalary = $tempBasic - $vSkyEmplerSsf;
        } else if ($vSkyEmpMainCatID == 3 || $vSkyEmpMainCatID == 5 || $vSkyEmpMainCatID == 6) {
            
            $vSkyempTaxableSalary = $tempBasic + $vSkyEmplerSsf;
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // uncomment paye to use the function//
        //$vSkyEmpPaye = tax_calc($vSkyempTaxableSalary, $vSky);
        
        $vSkyEmpTotalStatutoryDeductions = $vSkyEmplerSsf + $vSkyEmpPaye;
    
        $vSkyEmpTotalDeductions = $vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeductions;
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        

        if ($vSkyEmpMainCatID == 1 || $vSkyEmpMainCatID == 2) {
            $net_salary_before_other_deductions = $tempBasic - $vSkyEmpTotalStatutoryDeductions;
        } else {
            $net_salary_before_other_deductions = $tempBasic - $vSkyEmplerSsf - $vSkyEmpPaye;
        }

        if ($vSkyEmpMainCatID == 4 || $vSkyEmpMainCatID == 3) {
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            $vSkyEmNetSalaryPayable = $tempBasic - $vSkyEmplerSsf - $vSkyEmpTotalDeductions;

            if ($vSkyEmpBicycleDeduction == 0) {
                 $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = $tempBasic - $vSkyEmplerSsf - $vSkyEmpTotalDeductions - $tempvSkyEmpBicycleDeduction;

            } else {

                $vSkyEmpNetSalary = $tempBasic - $vSkyEmplerSsf - $vSkyEmpTotalDeductions - $vSkyEmpBicycleDeduction;

            }

        } else {

            if ($vSkyEmpBicycleDeduction == 0) {
             $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = $tempBasic - $vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeductions;

        $vSkyEmNetSalaryPayable = $tempBasic - $vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeductions - $tempvSkyEmpBicycleDeduction;

            } else {

                $vSkyEmpNetSalary = $tempBasic - ($vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeductions);

                $vSkyEmNetSalaryPayable = ($tempBasic - ($vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeduction)) - $vSkyEmpBicycleDeduction;

            }
        }
    } else {

         //   echo "here ";
        if ($vSkyEmpMainCatID == 2 || $vSkyEmpMainCatID == 4 || $vSkyEmpMainCatID == 1) {
            
            $vSkyempTaxableSalary = $vSkyEmpBasicSalary - $vSkyEmplerSsf;
          //  echo "5 ";
        } else if ($vSkyEmpMainCatID == 3 || $vSkyEmpMainCatID == 5 || $vSkyEmpMainCatID == 6) {
            
            $vSkyempTaxableSalary = $vSkyEmpBasicSalary + $vSkyEmplerSsf;
          //  echo "6 ";
        }
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //uncomment paye to use the function//
        
        // $vSkyEmpPaye = tax_calc($vSkyempTaxableSalary, $vSky);
        
        $vSkyEmpTotalStatutoryDeductions = $vSkyEmplerSsf + $vSkyEmpPaye;
    
        $vSkyEmpTotalDeductions = $vSkyEmpTotalStatutoryDeductions + $vSkyEmpDeductions;
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////


        if ($vSkyEmpMainCatID == 1 || $vSkyEmpMainCatID == 2) {
            
            $net_salary_before_other_deductions = $vSkyEmpBasicSalary - ($vSkyEmpTotalStatutoryDeductions);
         //   echo "8 ";
        } else {
            
            $net_salary_before_other_deductions = $vSkyEmpBasicSalary - ($vSkyEmplerSsf - $vSkyEmpPaye);
          //  echo "9 ";
        }

        if ($vSkyEmpMainCatID == 4 || $vSkyEmpMainCatID == 3) {
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            
            if($vSkyEmpTotalDeductions > $vSkyEmpBasicSalary){
                
                //$vSkyEmpTotalDeductions = $vSkyEmpBasicSalary;
                
            $vSkyEmNetSalaryPayable = 0;

            if ($vSkyEmpBicycleDeduction == 0) {
                
                $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = 0;
             //   echo "1 ";
            } else {

                $vSkyEmpNetSalary = 0;
              //  echo "2 ";
            }
                
            }else{
                //$vSkyEmpTotalDeductions = $vSkyEmpTotalDeductions;
                
            $vSkyEmNetSalaryPayable = ($vSkyEmpBasicSalary - $vSkyEmplerSsf) - $vSkyEmpTotalDeductions;

            if ($vSkyEmpBicycleDeduction == 0) {
                
                $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = (($vSkyEmpBasicSalary - $vSkyEmplerSsf) - $vSkyEmpTotalDeductions) - $tempvSkyEmpBicycleDeduction;
             //   echo "1 ";
            } else {

                $vSkyEmpNetSalary = (($vSkyEmpBasicSalary - $vSkyEmplerSsf) - $vSkyEmpTotalDeductions) - $vSkyEmpBicycleDeduction;
              //  echo "2 ";
            }        
         }
            


        } else {
            
            if($vSkyEmpTotalDeductions > $vSkyEmpBasicSalary){
                
              //  echo "just got here ";
                
               // $vSkyEmpTotalDeductions = $vSkyEmpBasicSalary;
                
            if ($vSkyEmpBicycleDeduction == 0) {
                
                $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = 0;

                $vSkyEmNetSalaryPayable = 0;
              //  echo "3 ";
            } else {

                $vSkyEmpNetSalary = $vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions);

                $vSkyEmNetSalaryPayable = ($vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions)) - $vSkyEmpBicycleDeduction;
               // echo "4 ";
            }
                
            }else{
                
              //  $vSkyEmpTotalDeductions = $vSkyEmpTotalDeductions;
                
             if ($vSkyEmpBicycleDeduction == 0) {
                
             $tempvSkyEmpBicycleDeduction = 0;

                $vSkyEmpNetSalary = $vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions);

                $vSkyEmNetSalaryPayable = ($vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions)) - $tempvSkyEmpBicycleDeduction;
               // echo "3 ";
            } else {

                $vSkyEmpNetSalary = $vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions);

                $vSkyEmNetSalaryPayable = ($vSkyEmpBasicSalary - ($vSkyEmpTotalDeductions)) - $vSkyEmpBicycleDeduction;
              //  echo "4 ";
            }
                
            }


        }
    }
    $dateInput = date("Y-m-d");

    if ($vSkyEmpMainCatID == 4 || $vSkyEmpMainCatID == 3) {

        $sqlQueryInsert = mysqli_query($vSky, "INSERT INTO `payroll_next_pay`(`emp_id`, `date_stored`, `basic_pay`, `emp_taxable_salary`, `emp_paye`, `emp_total_statutory_deductions`, `net_before_deductions`, `emp_net_salary`, `emp_bicycle_deduction`, `empnet_salary_payable`,  `employee_ssf`, `employer_ssf`, `debt_bal_b/d`, `current_loans/surcharges`,  `total_debt`, `deductions`, `bal_outstanding`, `total_deductions`, `updatee_date`) 
        VALUES ('".$emp_ids_got."', '".$dateInput."', '".$vSkyEmpBasicSalary."', '".$vSkyempTaxableSalary."', '".$vSkyEmpPaye."', '".$vSkyEmpTotalStatutoryDeductions."', '".$net_salary_before_other_deductions."', '".$vSkyEmNetSalaryPayable."', '".$vSkyEmpBicycleDeduction."', '".$vSkyEmpNetSalary."', '".$vSkyEmplerSsf."', '".$vSkyEmpSsf."', '".$vSkyEmpDebtBalance."', '".$vSkyEmpCurrentLoan."', '".$vSkyEmpTotalDebt."', '".$vSkyEmpDeductions."', '".$vSkyEmpBalanceOutStanding."', '".$vSkyEmpTotalDeductions."','".$dateInput."')");

    }else{

        $sqlQueryInsert = mysqli_query($vSky, "INSERT INTO `payroll_next_pay`(`emp_id`, `date_stored`, `basic_pay`, `emp_taxable_salary`, `emp_paye`, `emp_total_statutory_deductions`, `net_before_deductions`, `emp_net_salary`, `emp_bicycle_deduction`, `empnet_salary_payable`,  `employee_ssf`, `employer_ssf`, `debt_bal_b/d`, `current_loans/surcharges`,  `total_debt`, `deductions`, `bal_outstanding`, `total_deductions`, `updatee_date`) 
        VALUES ('".$emp_ids_got."', '".$dateInput."', '".$vSkyEmpBasicSalary."', '".$vSkyempTaxableSalary."', '".$vSkyEmpPaye."', '".$vSkyEmpTotalStatutoryDeductions."', '".$net_salary_before_other_deductions."', '".$vSkyEmpNetSalary."', '".$vSkyEmpBicycleDeduction."', '".$vSkyEmNetSalaryPayable."', '".$vSkyEmplerSsf."', '".$vSkyEmpSsf."', '".$vSkyEmpDebtBalance."', '".$vSkyEmpCurrentLoan."', '".$vSkyEmpTotalDebt."', '".$vSkyEmpDeductions."', '".$vSkyEmpBalanceOutStanding."', '".$vSkyEmpTotalDeductions."','".$dateInput."')");

    }
    

}

function tax_calc($x, $vSky){
    $q = mysqli_query($vSky, "SELECT `id`, `chargeable_income`, `rate`, `tax`, `cumulative_chargeable_income` FROM `taxes`");
    $c = mysqli_num_rows($q);
    $l = array();
////// --------------------------------------- ///////
            
////// --------------------------------------- ///////
    $i = 0;
    $v = 0;
    $s = 0;

while($j = mysqli_fetch_assoc($q)){
    $l[] = $j;
}

    $a = array();
    $b = array();
    //$e = 0;

    for($k=0; $k< count($l); $k++){
        
       $f = $l[$k]['cumulative_chargeable_income'];
       $p = $l[$k]['chargeable_income'];
       
        if($x <= $f){
////// --------------------------------------- ///////
            $y = $f;
            $g = $l[$k]['rate']/100 * $f;
////// --------------------------------------- ///////
                
        }else if($x > $f){
           
            if($p < $x){
                $a[] = $p;
            }else{
                $a[] = $x;
            }
        }
    }
    
    
    $h = count($a);
    $n = 0;
    
    for($t=0; $t < $h; $t++){
        
        $v   = round($a[$t] * $l[$t]['rate']/100, 2);
        $b[] = $v;
        $s  += $a[$t];
        
        if($s > $a[$h-1]){
            
            $w = $x - $s;
                
            $d = array_pop($a);
                  array_pop($b);
            
            $w += $d;
            $v  = round($w * $l[$h-1]['rate']/100, 2);
            
            $a[] = $w;
            $b[] = $v;

        }
    }
    
         for($q=0; $q < count($a); $q++){  
            
            $n  += round($b[$q], 2);
                
        }
    
    return $n;
}
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>