<?php
     include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


     if(isset($_POST['process'])){

        $process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process'])));
        $com_name = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['com_name'])));
        $currency = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['currency'])));
        $com_location = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['com_location'])));
        $bank_location = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['bank_location'])));
        $name_on_payroll = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['name_on_payroll'])));
        $bank_name = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['bank_name'])));
        $email = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['email'])));
        $tel = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['tel'])));
        $com_id = $_POST['com_id'];

        if($process == "update_sys"){

         $query = mysqli_query($vSky, "UPDATE `sys_settings` SET 
         `company_name`='$com_name', 
         `currency`='$currency', `location`='$com_location', 
         `tel`='$tel', `email`='$email', 
         `name_on_payslip`='$name_on_payroll',
         `bank_name_on_payslip`='$bank_name',
         `bank_location_on_payslip`='$bank_location' 
            WHERE `id`='$com_id'");

        if($query){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
        }
        echo json_encode($data);
        exit();
     }

if(isset($_POST['category'])){

        $query = mysqli_query($vSky, "SELECT * FROM `main_category`");
        $catInfos = array();
        $catids = array();
        $catVals = array();
        $catVal4 = array();
        $finalArray = array();

        while($fetch = mysqli_fetch_assoc($query)){
                $cat_name = $fetch['cat_name'];
                $cat_code = $fetch['cat_code'];
                $cat_ids = $fetch['cat_id'];

                $catInfos[] = $cat_name;
                $catids[] = $cat_ids;
        }

        foreach($catids as $id){

                $query3 = mysqli_query($vSky, "SELECT mCat.*, emp.`emp_main_cat_id` FROM `employees` AS emp
                INNER JOIN `main_category` AS mCat ON emp.`emp_main_cat_id`= mCat.`cat_id`
                WHERE mCat.`cat_id`='$id' AND emp.is_pending='0' AND emp.on_leave='0' AND emp.sacked='0'");

                $count = mysqli_num_rows($query3);
                $catVal4[] = $count;
        }
    
        
        for($i=0; $i < count($catVal4); $i++){
                array_push($catVals, $catVal4[$i]);
        }
        
        for($i=0; $i < count($catInfos); $i++){
                array_push($finalArray, $catInfos[$i]);
        }


        $data['values'] = $catVals;
        $data['name'] = $finalArray;
        $data['category'] = $catInfos;
        echo json_encode($data);
        exit();
}
?>
