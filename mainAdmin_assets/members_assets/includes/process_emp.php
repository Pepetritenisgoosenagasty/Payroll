<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if( isset($_POST['emp_name']) && isset($_POST['empBankNumber']) ){
    
 $emp_name = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['emp_name'])));
 $emp_number = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['emp_number'])));
 $emp_email = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['emp_email'])));
 $emp_nat = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['emp_nat'])));
 $empBankNumber = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empBankNumber'])));
 $empBankBranch = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empBankBranch'])));
 $empSSNIT = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empSSNIT'])));
 $empAddInfo = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empAddInfo'])));
 $vSkyeCategory = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyeCategory'])));
 $vSkyeDepartment = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyeDepartment'])));
 $vSkyePosition = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyePosition'])));
 $empBasicSal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empBasicSal'])));
 $empPaye = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empPaye'])));
 $dateIn = date("Y-m-d");
    
    $stmt = mysqli_query($vSky, "SELECT * FROM `employees`");
    while($row = mysqli_fetch_assoc($stmt)){
        $ssnit = $row['emp_ssnit'];
    }
    
    $stmt2 = mysqli_query($vSky, "SELECT `ssf_id` FROM `ssf` WHERE `active`='1' LIMIT 1");
    if($get = mysqli_fetch_assoc($stmt2)){
        $ssfDBid = $get['ssf_id'];
    }
    
    if($empSSNIT != "" && ($empSSNIT == $ssnit)){
        $data['ssnit'] = "ssnit";
    }else{
        
          $querySt = mysqli_query($vSky, "INSERT INTO `employees`(`emp_name`, `emp_phone`, `emp_email`, `emp_bank_account_no`, `emp_bank_branch`, `emp_ssnit`, `emp_nationality`, `emp_additional_info`,`emp_basic`, `emp_paye`, `emp_pos_id`, `emp_dept_id`, `emp_main_cat_id`, `ssf_id`, `input_date`, `last_update`, `is_pending`, `on_leave`, `sacked`) VALUES ('".$emp_name."', '".$emp_number."', '".$emp_email."', '".$empBankNumber."', '".$empBankBranch."', '".$empSSNIT."', '".$emp_nat."', '".$empAddInfo."', '".$empBasicSal."', '".$empPaye."', '".$vSkyePosition."', '".$vSkyeDepartment."', '".$vSkyeCategory."', '".$ssfDBid."', '".$dateIn."', '".$dateIn."', '0', '0', '0')");
    
    if($querySt){
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
        
    }
    echo json_encode($data);
    exit();
}

    


if(isset($_POST['departmentVsky']) && isset($_POST{'vSkyPosiName'})){
    
    $vSkyDeptSelect = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['departmentVsky'])));
    $vSkyPositionName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyPosiName'])));
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `positions` WHERE `pos_type_name`='$vSkyPositionName' AND `dep_id`='$vSkyDeptSelect' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
    
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "INSERT INTO `positions`(`pos_type_name`, `dep_id`, `pos_code`) VALUES ('".$vSkyPositionName."', '".$vSkyDeptSelect."','NULL')");
        if($vSkyStmt){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
    
    }else if($vSkyCount == 1){
        $data['vSkyFound'] = 'found';
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['vSkyEmpIdd'])){
    $vSkyIdEmp = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyEmpIdd'])));
    
    $vSkyStmt = mysqli_query($vSky,"SELECT * FROM `employees` AS emp 
                    INNER JOIN `department` AS dept ON emp.emp_dept_id = dept.id 
                    INNER JOIN `positions` AS pos ON emp.emp_pos_id = pos.pos_id 
                    INNER JOIN `main_category` AS mCat ON emp.emp_main_cat_id = mCat.cat_id 
                    INNER JOIN `ssf` AS s ON emp.ssf_id=s.ssf_id
                    WHERE emp.is_pending='0' AND emp.on_leave='0' AND emp.sacked='0' AND emp.emp_id='$vSkyIdEmp' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['vSkyEmpDbEmpID'] = $vSkyRow['emp_id'];
        $data['vSkyEmpDbName'] = $vSkyRow['emp_name'];
        $data['vSkyEmpDbPhone'] = $vSkyRow['emp_phone'];
        $data['vSkyEmpDbEmail'] = $vSkyRow['emp_email'];
        $data['vSkyEmpDbNation'] = $vSkyRow['emp_nationality'];
        $data['vSkyEmpDbbankNo'] = $vSkyRow['emp_bank_account_no'];
        $data['vSkyEmpDbbankBranch'] = $vSkyRow['emp_bank_branch'];
        $data['vSkyEmpDbSsint'] = $vSkyRow['emp_ssnit'];
        $data['vSkyEmpDbOtherInfo'] = $vSkyRow['emp_additional_info'];
  //////////////////////////////////////////////////////////////////////////
        $data['vSkyEmpDbPosId'] = $vSkyRow['emp_pos_id'];
        $data['vSkyEmpDbDeptId'] = $vSkyRow['emp_dept_id'];
        $data['vSkyEmpDbMainCatId'] = $vSkyRow['emp_main_cat_id'];
  /////////////////////////////////////////////////////////////////////////      
        $data['vSkyEmpDbBasic'] = $vSkyRow['emp_basic'];
        $data['vSkyEmpDbPaye'] = $vSkyRow['emp_paye'];
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['e_id']) && isset($_POST['e_name']) && isset($_POST['e_phone']) && isset($_POST['e_email'])){
    
    $e_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_id'])));
    $e_name = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_name'])));
    $e_phone = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_phone'])));
    $e_email = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_email'])));
    $e_nation = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_nation'])));
    $e_bankNo = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_bankNo'])));
    $e_bankBranch = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_bankbranch'])));
    $e_Ssnit = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_ssnit'])));
    $e_otherInfo = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_otherInfo'])));
    $update = date("Y-m-d");

    $stmt = mysqli_query($vSky, "SELECT emp_id FROM `employees` WHERE emp_id='$e_id' LIMIT 1");
    $count = mysqli_num_rows($stmt);
    
    if($count == 1){
        
        $stmt = mysqli_query($vSky, "UPDATE `employees` SET `emp_name`='$e_name', `emp_phone`='$e_phone', `emp_email`='$e_email',  `emp_bank_account_no`='$e_bankNo', `emp_bank_branch`='$e_bankBranch', `emp_ssnit`='$e_Ssnit', `emp_nationality`='$e_nation', `emp_additional_info`='$e_otherInfo', `last_update`='$update' WHERE `emp_id`='$e_id'");
        
        if($stmt){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
        
    }else{
        $data['empNotFound'] = 'nan';
    }
    echo json_encode($data);
    exit();
}

if (isset($_POST['post_id']) AND !empty($_POST['post_id'])) {
            //    session_start();
          //  $realName = $_SESSION['realname'];
    
    foreach($_POST['post_id'] as $indexId => $indexVal){
            $post_ids = mysqli_real_escape_string($vSky, $indexVal);
        
        $del_query = mysqli_query($vSky, "UPDATE `employees` SET `sacked`='1', `on_payroll`='2' WHERE `emp_id`='$post_ids'");
//        writeLogs($_conn, 'member', mysqli_real_escape_string($_conn, $post_ids), 'member', $realName.' Deleted member with ID of '.$post_ids.' successfully');
        }
    
            if($del_query){
                echo '_suc';
 
            }else{
                echo '_err';
               //  writeLogs($_conn, 'member', mysqli_real_escape_string($_conn, $memId), 'member', $realName.' Error Deleting Member With ID of '.$indexVal.'');
            }
}

if(isset($_POST['post_all'])){
    
    //$vSkyDelEmpId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['post_all'])));

    $vSkyStmt = mysqli_query($vSky, "UPDATE `employees` SET `sacked`='1', `on_payroll`='2'");
    
    if($vSkyStmt){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
    }

if(isset($_POST['emp_id_new']) && isset($_POST['emp_main_cat_id_new'])){
    
    $emp_ids = mysqli_real_escape_string($vSky, $_POST['emp_id_new']);
    $cat_ids = mysqli_real_escape_string($vSky, $_POST['emp_main_cat_id_new']);
    $lastIDD = array();
    $for_deleting = 1;
    
    $query = mysqli_query($vSky, "SELECT `emp_id` FROM `employees` WHERE `emp_id`='$emp_ids' LIMIT 1");
    $count = mysqli_num_rows($query);
    
    if($count ==  1){
        
        $query_update = mysqli_query($vSky, "UPDATE `employees` SET `on_payroll`='1' WHERE `emp_id`='$emp_ids'");
        
        if($query_update){
            
            $query_get = mysqli_query($vSky, "SELECT * FROM `employees` WHERE `emp_id`='$emp_ids' LIMIT 1");
            
            while($fetchGet = mysqli_fetch_assoc($query_get)){
                $emp_id = $fetchGet['emp_id'];
                $basic_pay = $fetchGet['emp_basic'];
                $paye = $fetchGet['emp_paye'];
                
                $query_neewIn = mysqli_query($vSky, "INSERT INTO `payroll_store`( `emp_id`, `basic_pay`, `emp_paye`, `ready_for_deleting`) VALUES ('".$emp_id."', '".$basic_pay."', '".$paye."', '".$for_deleting."')");
                
                $lastIDD[] = mysqli_insert_id($vSky);
            }
        }
    }else{
        $data['no_emp_found'] = "no_emp_found";
    }
    
    if($query_neewIn){
        
    $data['vSkySuc'] = true;
    $data['lastIDD'] = $lastIDD;
    $data['emp_id'] = $emp_id;
        
    }else{
        
    $data['vSkySuc'] = false;
        
    }
    
    
    echo json_encode($data);
    exit();
    
}

if(isset($_POST['emp_idNEW']) && isset($_POST['lastIDD'])){
    
    $emp_ids = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['emp_idNEW'])));
    $last_id = $_POST['lastIDD'];
    $inDate = date("Y-m-d");
    
    foreach($last_id as $id){
        $query_payy_in = mysqli_query($vSky, "INSERT INTO `pay_dates_pay`(`emp_id`, `payroll_lastPayId`, `pay_date`, `last_payDate`) VALUES ('".$emp_ids."','".$id."','".$inDate."','".$inDate."')");
    }
    
    if($query_payy_in){
        
        $data['vSkySuc'] = true;
        
    }else{
        
        $data['vSkySuc'] = false;
        

    }
    
echo json_encode($data);
    exit();
}
?>