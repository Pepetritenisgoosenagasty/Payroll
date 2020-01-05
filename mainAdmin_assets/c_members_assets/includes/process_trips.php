<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");

if(isset($_POST['process'])){

    $t_drID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_drID'])));
    $t_tkID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_tkID'])));
    $t_drName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_drName'])));
    $t_vName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_vName'])));
    $t_lDate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_lDate'])));
    $mainCom_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['mainCom_id'])));
    $subCom_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['subCom_id'])));
    $t_waybill = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_waybill'])));
    $t_product = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_product'])));
    $t_quantity = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_quantity'])));
    $t_l_d_pt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_l_d_pt'])));
    $t_distance = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_distance'])));
    $t_rate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_rate'])));
    $t_amount = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_amount'])));
    $t_nyt_alw = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['t_nyt_alw'])));
    $process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process'])));
    $inputDateTime = date("Y-m-d h:i:s");
    
    if($process == "add_new_trip"){
        
        //////////////////////////////// Check iF Driver is actualy available //////////////////////////////////
        $chk_dr_q = queryn($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='1' AND `is_available`='1' AND `is_driver`='1' AND `on_trip`='0' AND `driver_emp_id`='$t_drID' LIMIT 1");
        $count_dem = rows($chk_dr_q);
        
        if($count_dem == 1){
            
            /////////////////////// get locations info. ///////////////////////////
            $loc_get = queryn($vSky, "SELECT * FROM `locations` WHERE `id`='$t_l_d_pt' LIMIT 1");
            
            while($get_l_d = assoc($loc_get)){
                $loading_pt = $get_l_d['loading_pt_name'];
                $discharging_pt = $get_l_d['discharging_pt_name'];
            }
            
            ///////////////// get main company name //////////////////////////////
            $mCom_get = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$mainCom_id' LIMIT 1");
            
            while($get_l_m = assoc($mCom_get)){
                $mCom_name = $get_l_m['name'];
                $presented_to = $get_l_m['presented_to'];
                $main_name = $get_l_m['main_name'];
                $location = $get_l_m['location'];
                $tel = $get_l_m['tel'];
            }
            
            ////////////////// get sub company name //////////////////////////
            $sCom_get = queryn($vSky, "SELECT sub_name FROM `sub_companies` WHERE `id`='$subCom_id' LIMIT 1");
            
            while($get_l_s = assoc($sCom_get)){
                $sCom_name = $get_l_s['sub_name'];
            }
            
             ////////////////// add trip to current trips table ////////////////////           
        $insert_trip_q = queryn($vSky, "INSERT INTO `current_trips`(`emp_id`, `driver_id`, `driver_name`, `location_id`, `main_company_name`, `sub_company_name`, `loading_date`, `waybill_no`, `truck_no`, `truck_id`, `product`, `qty`, `loading_pt`, `discharging_pt`, `distance`, `rate`, `amount`, `overnight_allowance`, `is_done`, `is_inprogress`, `input_date_time`, `presented_to`, `main_name`, `location`, `tel`) VALUES ('".$t_drID."', '".$t_drID."', '".$t_drName."', '".$t_l_d_pt."', '".$mCom_name."', '".$sCom_name."', '".$t_lDate."', '".$t_waybill."', '".$t_vName."', '".$t_tkID."', '".$t_product."', '".$t_quantity."', '".$loading_pt."', '".$discharging_pt."', '".$t_distance."', '".$t_rate."', '".$t_amount."', '".$t_nyt_alw."', '0', '1', '".$inputDateTime."', '".$presented_to."', '".$main_name."', '".$location."', '".$tel."')");
            
            if($insert_trip_q){
                
                ///////////////// put driver on trip ///////////////////
                $put_on_trip = queryn($vSky, "UPDATE `drivers` SET `on_trip`='1' WHERE `driver_emp_id`='$t_drID'");
                
                if($put_on_trip){
                    
                  $data['vSkySuc'] = true;  
                    
                }else{
                    
                  $data['vSkySuc'] = false;
                    
                }    
            } 
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['e_process'])){

    $e_trip_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_trip_id'])));
    $e_drID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_drID'])));
    $e_tkID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_tkID'])));
    $e_vName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_vName'])));
    $e_lDate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_lDate'])));
    $mainCom_id_e = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['mainCom_id_e'])));
    $subCom_id_e = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['subCom_id_e'])));
    $e_waybill = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_waybill'])));
    $e_product = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_product'])));
    $e_quantity = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_quantity'])));
    $e_l_d_pt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_l_d_pt'])));
    $e_distance = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_distance'])));
    $e_rate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_rate'])));
    $e_amount = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_amount'])));
    $e_nyt_alw = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_nyt_alw'])));
    $e_process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_process'])));
    $inputDateTime = date("Y-m-d h:i:s");
    
    if($e_process == "update_the_new_trip"){
        
        //////////////////////////////// Check iF Driver is actualy available //////////////////////////////////
        $chk_dr_q = queryn($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='1' AND `is_available`='1' AND `is_driver`='1' AND `on_trip`='1' AND `driver_emp_id`='$e_drID' LIMIT 1");
        $count_dem = rows($chk_dr_q);
        
        if($count_dem == 1){
            
            /////////////////////// get locations info. ///////////////////////////
            $loc_get = queryn($vSky, "SELECT * FROM `locations` WHERE `id`='$e_l_d_pt' LIMIT 1");
            
            while($get_l_d = assoc($loc_get)){
                $loading_pt = $get_l_d['loading_pt_name'];
                $discharging_pt = $get_l_d['discharging_pt_name'];
            }
            
            
            if($mainCom_id_e == "oldM" && $subCom_id_e == "oldSub"){
                ////////////////// key old values  //////////////////////////////////////////
                
                $update_q = queryn($vSky, "UPDATE `current_trips` SET `loading_date`='$e_lDate', `waybill_no`='$e_waybill', `truck_no`='$e_vName', `product`='$e_product', `qty`='$e_quantity', `loading_pt`='$loading_pt', `discharging_pt`='$discharging_pt', `distance`='$e_distance', `rate`='$e_rate', `amount`='$e_amount', `overnight_allowance`='$e_nyt_alw' WHERE `id`='$e_trip_id'").mysqli_error($vSky);
                
                if($update_q){
                    
                    $data['vSkySuc'] = true;
                    
                }else{
                    
                    $data['vSkySuce'] = false;
                    
                }
                
            }else{

            ///////////////// get main company name /////////////////////////
            $mCom_get = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$mainCom_id_e' LIMIT 1");
            
            while($get_l_m = assoc($mCom_get)){
                $mCom_name = $get_l_m['name'];
                $presented_to = $get_l_m['presented_to'];
                $main_name = $get_l_m['main_name'];
                $location = $get_l_m['location'];
                $tel = $get_l_m['tel'];
            }
            
            ////////////////// get sub company name //////////////////////////
            $sCom_get = queryn($vSky, "SELECT sub_name FROM `sub_companies` WHERE `id`='$subCom_id_e' LIMIT 1");
            
            while($get_l_s = assoc($sCom_get)){
                $sCom_name = $get_l_s['sub_name'];
            }
            
             ////////////////// update trip in the current trips table //////////////         
                $update_q = queryn($vSky, "UPDATE `current_trips` SET `main_company_name`='$mCom_name', `sub_company_name`='$sCom_name', `loading_date`='$e_lDate', `waybill_no`='$e_waybill', `truck_no`='$e_vName', `product`='$e_product', `qty`='$e_quantity', `loading_pt`='$loading_pt', `discharging_pt`='$discharging_pt', `distance`='$e_distance', `rate`='$e_rate', `amount`='$e_amount', `overnight_allowance`='$e_nyt_alw', `presented_to`='$presented_to', `main_name`='$main_name', `location`='$location', `tel`='$tel' WHERE `id`='$e_trip_id'");
                
                if($update_q){
                    
                    $data['vSkySuc'] = true;
                    
                }else{
                    
                    $data['vSkySuc'] = false;
                    
                }  
            }
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['r_r_apply_return_trip'])){
    
    $r_r_drID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_drID'])));
    $r_r_tkID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_tkID'])));
    $r_r_trip_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_trip_id'])));
    $r_r_shortage = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_shortage'])));
    $r_r_shortage_val = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_shortage_val'])));
    $r_r_amt_due = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_amt_due'])));
    $r_r_fuel_consumed = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_fuel_consumed'])));
    $r_r_fuel_in_cash = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_fuel_in_cash'])));
    $r_r_dDate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_dDate'])));
    $r_pay_due_kodson = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_pay_due_kodson'])));
    $r_amt_recievable = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_amt_recievable'])));
    $r_amt_recievable_surchage = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_amt_recievable_surchage'])));
    $r_cash_paid_to_make_loss = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_cash_paid_to_make_loss'])));
    $r_receipt_no = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_receipt_no'])));
    $r_balance = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_balance'])));
    $r_r_apply_return_trip = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_r_apply_return_trip'])));
    $return_real_date = date("F d, Y", strtotime($r_r_dDate));
    $inDate = date("Y-m-d");
    
    if($r_r_apply_return_trip == "return_trip"){
        
        ////////////////// check if trip exists ////////////////////////////////////////////////////
        
        $chkTrip = queryn($vSky, "SELECT `id` FROM `current_trips` WHERE `id`='$r_r_trip_id' AND `is_done`='0' AND `is_inprogress`='1' LIMIT 1");
        $c_trip = rows($chkTrip);
        
        if($c_trip == 1){
            
            $update_trip = queryn($vSky, "UPDATE `current_trips` SET `discharging_date`='$r_r_dDate', `shortage`='$r_r_shortage', `shortage_val`='$r_r_shortage_val', `amount_due`='$r_r_amt_due', `fuel_consumed`='$r_r_fuel_consumed', `fuel_consumed_in_cash`='$r_r_fuel_in_cash', `pay_due_kodson`='$r_pay_due_kodson', `amt_recievable`='$r_amt_recievable', `cash_paid_to_make_loss`='$r_cash_paid_to_make_loss', `balance`='$r_balance', `receipt_no`='$r_receipt_no', `is_done`='1', `is_inprogress`='0' WHERE `id`='$r_r_trip_id'");
            
            if($update_trip){
                
                $u_dr = queryn($vSky, "UPDATE `drivers` SET `on_trip`='0' WHERE `driver_emp_id`='$r_r_drID'");
                
                if($u_dr){
                    $comments = "Amount Recievable (Shortage Made On Trip With Discharging Date Of )".$return_real_date;
                    ////////////////////////// insert into surcharges ////////////////////////////////////
                    if($r_amt_recievable_surchage > 0){
                        
                    $insert_surcharge = queryn($vSky, "INSERT INTO `debt_surcharges`(`emp_id`, `debt_surcharges`, `comments`, `from_others_id`, `input_date`) VALUES ('".$r_r_drID."', '".$r_amt_recievable_surchage."', '".$comments."', '".$r_r_trip_id."', '".$inDate."')");
                    
                        if($insert_surcharge){

                            $data['vSkySuc'] = true;

                        }else{

                            $data['vSkySuc'] = "false";

                        }
                        
                    }else{
                        
                        $data['vSkySuc'] = true;
                        
                    }
                    
                    }else{
                    
                    $data['vSkySuc'] = false;
                    
                }
                
            }else{
                
              $data['tripUpdateErr'] = "tripUpdateErr"; 
                
            }
            
        }else{
            
            $data['tripNun'] = "tripNun";
            
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['r_apply_return_trip'])){
    
    $r_edit_trip_id_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_trip_id_update'])));
    $r_edit_drID_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_drID_update'])));
    $r_edit_dDate_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_dDate_update'])));
    $r_edit_shortage_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_shortage_update'])));
    $r_edit_shortage_val_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_shortage_val_update'])));
    $r_edit_amt_due_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_amt_due_update'])));
    $r_edit_fuel_consumed_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_fuel_consumed_update'])));
    $r_edit_fuel_in_cash_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_fuel_in_cash_update'])));
    $r_edit_pay_due_kodson_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_pay_due_kodson_update'])));
    $r_edit_amt_recievable_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_amt_recievable_update'])));
    $r_edit_amt_recievable_surcharg_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_amt_recievable_surcharg_update'])));
    $r_edit_cash_paid_to_make_loss_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_cash_paid_to_make_loss_update'])));
    $r_edit_receipt_no_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_receipt_no_update'])));
    $r_edit_balance_update = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_edit_balance_update'])));
    $r_apply_return_trip = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_apply_return_trip'])));
  
    if($r_apply_return_trip == "return_trip_edit_update"){
        
        ////////////////// check if trip exists ////////////////////////////////////////////////////
        
        $chkTrip = queryn($vSky, "SELECT `id` FROM `current_trips` WHERE `id`='$r_edit_trip_id_update' AND `is_done`='1' AND `is_inprogress`='0' LIMIT 1");
        $c_trip = rows($chkTrip);
        
        if($c_trip == 1){
            
            $update_trip = queryn($vSky, "UPDATE `current_trips` SET `discharging_date`='$r_edit_dDate_update', `shortage`='$r_edit_shortage_update', `shortage_val`='$r_edit_shortage_val_update', `amount_due`='$r_edit_amt_due_update', `fuel_consumed`='$r_edit_fuel_consumed_update', `fuel_consumed_in_cash`='$r_edit_fuel_in_cash_update', `pay_due_kodson`='$r_edit_pay_due_kodson_update', `amt_recievable`='$r_edit_amt_recievable_update', `cash_paid_to_make_loss`='$r_edit_cash_paid_to_make_loss_update', `receipt_no`='$r_edit_receipt_no_update', `balance`='$r_edit_balance_update', `is_done`='1', `is_inprogress`='0' WHERE `id`='$r_edit_trip_id_update'");
            
            if($update_trip){
                //////////////////////// check if the surgcharge is less or equal to 0 and delete from surcharges ////////////////
                if($r_edit_amt_recievable_surcharg_update <= 0){
                        
                $get_surchage = queryn($vSky, "SELECT * FROM `debt_surcharges` WHERE `from_others_id`='$r_edit_trip_id_update' LIMIT 1");
                $n = rows($get_surchage);
                
                    if($n == 1){
                        /////////////////////////////////////  do the deleting /////////////////////////////////////
                        $del = queryn($vSky, "DELETE FROM `debt_surcharges` WHERE `from_others_id`='$r_edit_trip_id_update'");
                        
                        if($del){
                            
                            $data['vSkySuc'] = true;
                            
                        }else{
                            
                            $data['vSkySuc'] = false;
                            
                        }
                        
                    }
                    
                }else{
                /////////////////////// put the updated value in ///////////////////////////////////////////////////////
                    $get_surchage = queryn($vSky, "SELECT * FROM `debt_surcharges` WHERE `from_others_id`='$r_edit_trip_id_update' LIMIT 1");
                    $n = rows($get_surchage);
                    
                    if($n == 1){
                        /////////////////////////////////// do the updating /////////////////////////////////////////
                        $update_surcharge_val = queryn($vSky, "UPDATE `debt_surcharges` SET `debt_surcharges`='$r_edit_amt_recievable_surcharg_update' WHERE `from_others_id`='$r_edit_trip_id_update'");
                        
                        if($update_surcharge_val){
                            
                            $data['vSkySuc'] = true;
                            
                        }else{
                            
                            $data['vSkySuc'] = false;
                            
                        }
                        
                    }
                    
                }
                
            }else{
                
              $data['vSkySuc'] = false; 
                
            }
            
        }else{
            
            $data['tripNun'] = "tripNun";
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['bk_process'])){
        $bk_process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['bk_process'])));
        $crr_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['crr_id'])));
    
    if($bk_process == "bk_process"){
        
            
            ////////////////////////// check if trip is present ////////////////////////////////////////
        $chkBkTrip = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$crr_id' AND `is_done`='1' AND `is_inprogress`='0' LIMIT 1");
        $get_id = rows($chkBkTrip);
        
        if($get_id == 1){
            
            /////////////////////////// get drivers id //////////////////////////////////////////////////
            $chkBkTrip = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$crr_id' AND `is_done`='1' AND `is_inprogress`='0' LIMIT 1");
            
            while($fetchDrId = assoc($chkBkTrip)){
                $drBkId = $fetchDrId['driver_id'];
            }
            
            ////////////////////////// check if driver isnt on any other trip ///////////////////////////
            $chkDrtrip = queryn($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$drBkId' AND `on_trip`='0' AND `is_available`='1' AND `is_driver`='1'");
            $c_drTrip = rows($chkDrtrip);
            
            if($c_drTrip == 1){
                
            /////////////////////// now put trip and driver back on trip ////////////////////////////////
            $putBkTrip = queryn($vSky, "UPDATE `current_trips` SET `shortage`='0', `shortage_val`='0', `amount_due`='0', `fuel_consumed`='0', `fuel_consumed_in_cash`='0', `pay_due_kodson`='0', `amt_recievable`='0', `cash_paid_to_make_loss`='0', `receipt_no`='', `balance`='0', `is_done`='0', `discharging_date`='0000-00-00', `is_inprogress`='1' WHERE `id` ='$crr_id'");
                
                if($putBkTrip){

                $drPut = queryn($vSky, "UPDATE `drivers` SET `on_trip`='1' WHERE `driver_emp_id`='$drBkId'");
                    
                    if($drPut){

                        $data['vSkySuc'] = true;
                        
                    }else{
                        
                        $data['vSkySuc'] = false;
                        
                    }

                }else{

                    $data['vSkySuc'] = false;

                }
                
            }else{
                
            $data['dr_err'] = "dr_err";
                
            }
            
        }else{
            
            $data['trip_err'] = "trip_err";
            
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['del_process'])){
    
    $action = mysqli_real_escape_string($vSky, $_POST['del_process']);
    $del_id = mysqli_real_escape_string($vSky, $_POST['del_id']);
    
    if($action == "del_process"){
        
        $chk = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$del_id' LIMIT 1");
        $c = rows($chk);
        
        if($c == 1){
            
            $chk = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$del_id' LIMIT 1");
            while($f = assoc($chk)){
                $driver_id = $f['driver_id'];
            }
            
            $up = queryn($vSky, "UPDATE `drivers` SET `on_trip`='0' WHERE `driver_emp_id`='$driver_id'");
            
            if($up){
                
                $del_q = queryn($vSky, "DELETE FROM `current_trips` WHERE `id`='$del_id'");
            
                if($del_q){
                    
                    $data['vSkySuc'] = true;
                    
                }else{
                    
                    $data['vSkySuc'] = false;
                    
                }
            }
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['mainCom_id'])){
    
    $mainCom_id = mysqli_real_escape_string($vSky, $_POST['mainCom_id']);
    $output = "";
    
    $get_subComs = queryn($vSky, "SELECT * FROM `sub_companies` WHERE `main_company_id`='$mainCom_id'");
    
    while($e = assoc($get_subComs)){
        $subCom_id = $e['id'];
        $subCom_name = $e['sub_name'];
        
        $output .= "<option value='$subCom_id'>$subCom_name</option>";
    }
    
    echo $output;
    exit();
}

if(isset($_POST['process_driver'])){
        $driver_id = mysqli_real_escape_string($vSky, $_POST['driver_id']);
        $process_driver = mysqli_real_escape_string($vSky, $_POST['process_driver']);
    
    if($process_driver == "getDriverInfo"){
        
        $chk_dr_q = queryn($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='1' AND `is_available`='1' AND `is_driver`='1' AND `on_trip`='0' AND `driver_emp_id`='$driver_id' LIMIT 1");
        $count_dem = rows($chk_dr_q);
        
        if($count_dem == 1){
            
             $chk_dr_q_get = queryn($vSky, "SELECT dr.`driver_name`, dr.`driver_emp_id`, dr.`truck_id`, tk.`truck_no` FROM `drivers` AS dr INNER JOIN `truck` AS tk ON dr.`truck_id`=tk.`id` WHERE dr.`is_assigned`='1' AND dr.`is_available`='1' AND dr.`is_driver`='1' AND dr.`on_trip`='0' AND dr.`driver_emp_id`='$driver_id' LIMIT 1");
            
            while($fetch = assoc($chk_dr_q_get)){
                $driverName =  $fetch['driver_name'];
                $driverId =  $fetch['driver_emp_id'];
                $truckId = $fetch['truck_id'];
                $truckNo = $fetch['truck_no'];
            }
            
            if($chk_dr_q_get){
                
                $data['driver_name'] = $driverName;
                $data['driver_id'] = $driverId;
                $data['truck_id'] = $truckId;
                $data['truck_no'] = $truckNo;
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['location_id'])){
    
    $location_id = mysqli_real_escape_string($vSky, $_POST['location_id']);
    
    $q_l = queryn($vSky, "SELECT * FROM `locations` WHERE `id`='$location_id' LIMIT 1");
    $c_l = rows($q_l);
    
    if($c_l == 1){
       
    $q_l_g = queryn($vSky, "SELECT * FROM `locations` WHERE `id`='$location_id' LIMIT 1");
        
        while($f_l = assoc($q_l_g)){
            $rate = $f_l['rate'];
            $distance = $f_l['distance'];
        }
        
        if($q_l_g){
            
            $data['rate'] = $rate;
            $data['distance'] = $distance;
            $data['vSkySuc'] = true;
            
        }else{
            
            $data['vSkySuc'] = false;
            
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['getEditInfos'])){
    
        $tripID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['tripID'])));
        $getEditInfos = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['getEditInfos'])));
    
    if($getEditInfos == "getEditInfos"){
        
                $get_dem_now = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$tripID' LIMIT 1");
        
        while($getDemNow = assoc($get_dem_now)){
            
            $e_trip_id = $getDemNow['id'];
            $e_drID = $getDemNow['driver_id'];
            $e_tkID = $getDemNow['truck_id'];
            $e_location_id= $getDemNow['location_id'];
            $e_drName = $getDemNow['driver_name'];
            $e_vName = $getDemNow['truck_no'];
            $e_lDate = $getDemNow['loading_date'];
            $e_oldMcom = $getDemNow['main_company_name'];
            $e_oldSubCom = $getDemNow['sub_company_name'];
            $e_waybill = $getDemNow['waybill_no'];
            $e_product = $getDemNow['product'];
            $e_quantity = $getDemNow['qty'];
            $e_old_loading_pt = $getDemNow['loading_pt'];
            $e_old_discharging_pt = $getDemNow['discharging_pt'];
            $e_distance = $getDemNow['distance'];
            $e_rate = $getDemNow['rate'];
            $e_amount = $getDemNow['amount'];
            $e_nyt_alw = $getDemNow['overnight_allowance'];
            
        }
        
        $sys_vals = queryn($vSky, "SELECT `value_multiplied_by_short`, `value_multiplied_by_fuel` FROM `sys_settings`");
        
        while($sysVals = arr($sys_vals)){
                $e_shortage_rate = $sysVals['value_multiplied_by_short'];
                $e_fuel_in_cash_rate = $sysVals['value_multiplied_by_fuel'];
            
        }
        
        if($get_dem_now){
            
            $data['r_trip_id'] = $e_trip_id;
            $data['driver_id'] = $e_drID;
            $data['truck_id'] = $e_tkID;
            $data['location_id'] = $e_location_id;
            $data['driver_name'] = $e_drName;
            $data['truck_no'] = $e_vName;
            $data['loading_date'] = $e_lDate;
            $data['main_company_name'] = $e_oldMcom;
            $data['sub_company_name'] = $e_oldSubCom;
            $data['waybill_no'] = $e_waybill;
            $data['product'] = $e_product;
            $data['qty'] = $e_quantity;
            $data['loading_pt'] = $e_old_loading_pt;
            $data['discharging_pt'] = $e_old_discharging_pt;
            $data['distance'] = $e_distance;
            $data['rate'] = $e_rate;
            $data['amount'] = $e_amount;
            $data['overnight_allowance'] = $e_nyt_alw;
            $data['r_shortage_rate'] = $e_shortage_rate;
            $data['r_fuel_in_cash_rate'] = $e_fuel_in_cash_rate;
            $data['vSkySuc'] = true;

        }else{
            
            $data['vSkySuc'] = false;
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['r_process'])){
        $r_process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_process'])));
        $r_rtd = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_rtd'])));
    
    if($r_process == "r_process"){
        
        $get_dem_now = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$r_rtd' LIMIT 1");
        
        while($getDemNow = assoc($get_dem_now)){
            
            $r_trip_id = $getDemNow['id'];
            $r_drID = $getDemNow['driver_id'];
            $r_tkID = $getDemNow['truck_id'];
            $r_drName = $getDemNow['driver_name'];
            $r_vName = $getDemNow['truck_no'];
            $r_lDate = $getDemNow['loading_date'];
            $r_dDate = $getDemNow['discharging_date'];
            $r_mainCom = $getDemNow['main_company_name'];
            $r_subCom = $getDemNow['sub_company_name'];
            $r_waybill = $getDemNow['waybill_no'];
            $r_product = $getDemNow['product'];
            $r_quantity = $getDemNow['qty'];
            $r_lPt = $getDemNow['loading_pt'];
            $r_dPt = $getDemNow['discharging_pt'];
            $r_distance = $getDemNow['distance'];
            $r_rate = $getDemNow['rate'];
            $r_amount = $getDemNow['amount'];
            $r_nyt_alw = $getDemNow['overnight_allowance'];
            
        }
        
        $sys_vals = queryn($vSky, "SELECT `value_multiplied_by_short`, `value_multiplied_by_fuel` FROM `sys_settings`");
        
        while($sysVals = arr($sys_vals)){
                $r_shortage_rate = $sysVals['value_multiplied_by_short'];
                $r_fuel_in_cash_rate = $sysVals['value_multiplied_by_fuel'];
            
        }
        
        if($get_dem_now){
            
            $data['r_trip_id'] = $r_trip_id;
            $data['driver_id'] = $r_drID;
            $data['truck_id'] = $r_tkID;
            $data['driver_name'] = $r_drName;
            $data['truck_no'] = $r_vName;
            $data['loading_date'] = $r_lDate;
            $data['discharging_date'] = $r_dDate;
            $data['main_company_name'] = $r_mainCom;
            $data['sub_company_name'] = $r_subCom;
            $data['waybill_no'] = $r_waybill;
            $data['product'] = $r_product;
            $data['qty'] = $r_quantity;
            $data['loading_pt'] = $r_lPt;
            $data['discharging_pt'] = $r_dPt;
            $data['distance'] = $r_distance;
            $data['rate'] = $r_rate;
            $data['amount'] = $r_amount;
            $data['overnight_allowance'] = $r_nyt_alw;
            $data['r_shortage_rate'] = $r_shortage_rate;
            $data['r_fuel_in_cash_rate'] = $r_fuel_in_cash_rate;
            $data['vSkySuc'] = true;

        }else{
            
            $data['vSkySuc'] = false;
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['r_process_edit'])){
        $r_process_edit = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['r_process_edit'])));
        $returned_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['returned_id'])));
    
    if($r_process_edit == "r_process_edit"){
        
        $get_dem_now = queryn($vSky, "SELECT * FROM `current_trips` WHERE `id`='$returned_id' LIMIT 1");
        
        while($getDemNow = assoc($get_dem_now)){
            
            $r_edit_drID = $getDemNow['driver_id'];
            $r_edit_tkID = $getDemNow['truck_id'];
            $r_edit_trip_id = $getDemNow['id'];
            $r_edit_drName = $getDemNow['driver_name'];
            $r_edit_vName = $getDemNow['truck_no'];
            $r_edit_lDate = $getDemNow['loading_date'];
            $r_edit_dDate = $getDemNow['discharging_date'];
            $r_edit_mainCom = $getDemNow['main_company_name'];
            $r_edit_subCom = $getDemNow['sub_company_name'];
            $r_edit_waybill = $getDemNow['waybill_no'];
            $r_edit_product = $getDemNow['product'];
            $r_edit_quantity = $getDemNow['qty'];
            $r_edit_loading_pt = $getDemNow['loading_pt'];
            $r_edit_discharging_pt = $getDemNow['discharging_pt'];
            $r_edit_distance = $getDemNow['distance'];
            $r_edit_rate = $getDemNow['rate'];
            $r_edit_amount = $getDemNow['amount'];
            $r_edit_nyt_alw = $getDemNow['overnight_allowance'];
            $r_edit_shortage = $getDemNow['shortage'];
            $r_edit_shortage_val = $getDemNow['shortage_val'];
            $r_edit_amt_due = $getDemNow['amount_due'];
            $r_edit_fuel_consumed = $getDemNow['fuel_consumed'];
            $r_edit_fuel_in_cash = $getDemNow['fuel_consumed_in_cash'];
            $r_edit_pay_due_kodson = $getDemNow['pay_due_kodson'];
            $r_edit_amt_recievable = $getDemNow['amt_recievable'];
            $r_edit_cash_paid_to_make_loss = $getDemNow['cash_paid_to_make_loss'];
            $r_edit_receipt_no = $getDemNow['receipt_no'];
            $r_edit_balance = $getDemNow['balance'];
            
            ///////////////// get surcharge inserted //////////////////////
            
            $get_surchage = queryn($vSky, "SELECT * FROM `debt_surcharges` WHERE `from_others_id`='$returned_id' LIMIT 1");
            $c = rows($get_surchage);
            
            if($c == 1){
                
            $get_surchage = queryn($vSky, "SELECT * FROM `debt_surcharges` WHERE `from_others_id`='$returned_id' LIMIT 1");
                
              if($if_in = assoc($get_surchage)){
                  
                    $sucharge = $if_in['debt_surcharges'];
                  
                }  
            }else{
                
                $sucharge = 0;
            }
        }
        
        $sys_vals = queryn($vSky, "SELECT `value_multiplied_by_short`, `value_multiplied_by_fuel` FROM `sys_settings`");
        
        while($sysVals = arr($sys_vals)){
                $r_shortage_rate = $sysVals['value_multiplied_by_short'];
                $r_fuel_in_cash_rate = $sysVals['value_multiplied_by_fuel'];
            
        }
        
        if($get_dem_now){
            
            $data['driver_id'] = $r_edit_drID;
            $data['truck_id'] = $r_edit_tkID;
            $data['id'] = $r_edit_trip_id;
            $data['driver_name'] = $r_edit_drName;
            $data['truck_no'] = $r_edit_vName;
            $data['loading_date'] = $r_edit_lDate;
            $data['discharging_date'] = $r_edit_dDate;
            $data['main_company_name'] = $r_edit_mainCom;
            $data['sub_company_name'] = $r_edit_subCom;
            $data['waybill_no'] = $r_edit_waybill;
            $data['product'] = $r_edit_product;
            $data['qty'] = $r_edit_quantity;
            $data['loading_pt'] = $r_edit_loading_pt;
            $data['discharging_pt'] = $r_edit_discharging_pt;
            $data['distance'] = $r_edit_distance;
            $data['rate'] = $r_edit_rate;
            $data['amount'] = $r_edit_amount;
            $data['overnight_allowance'] = $r_edit_nyt_alw;
            $data['shortage'] = $r_edit_shortage;
            $data['shortage_val'] = $r_edit_shortage_val;
            $data['amount_due'] = $r_edit_amt_due;
            $data['fuel_consumed'] = $r_edit_fuel_consumed;
            $data['fuel_consumed_in_cash'] = $r_edit_fuel_in_cash;
            $data['value_multiplied_by_short'] = $r_shortage_rate;
            $data['value_multiplied_by_fuel'] = $r_fuel_in_cash_rate;
            $data['pay_due_kodson'] = $r_edit_pay_due_kodson;
            $data['amt_recievable'] = $r_edit_amt_recievable;
            $data['r_edit_amt_recievable_surcharg'] = $sucharge;
            $data['cash_paid_to_make_loss'] = $r_edit_cash_paid_to_make_loss;
            $data['receipt_no'] = $r_edit_receipt_no;
            $data['balance'] = $r_edit_balance;
            $data['vSkySuc'] = true;

        }else{
            
            $data['vSkySuc'] = false;
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}
//////////////////////////////////////// moving trips to history ///////////////////////////////////////////////////
if(isset($_POST['chk_avail'])){
    
    $chk_avail = mysqli_real_escape_string($vSky, $_POST['chk_avail']);
    
    if($chk_avail == "chk_avail"){
        
        $chk_for_trips = queryn($vSky, "SELECT * FROM `current_trips`");
        $count_it = rows($chk_for_trips);
        
        if($count_it > 0){
            
            $data['vSkySuc'] = true;
            
        }else{
            
            $data['vSkySuc'] = false;
            
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['proceed_action'])){
    
    $proceed_action = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['proceed_action'])));
    
    if($proceed_action == "proceed_movement"){
        
        $get_all_trips = queryn($vSky, "SELECT * FROM `current_trips`");
        $c_it = rows($get_all_trips);
        
        if($c_it > 0){
            
            //////////////////////////////////// update is last field to 0 ////////////////////////////////
            $update_is_last = queryn($vSky, "UPDATE `trips_history` SET `is_last` = '0'");
            if($update_is_last){
                
            //////////////////////////// get all values in the current trip table /////////////////////////
            $get_all_trips = queryn($vSky, "SELECT * FROM `current_trips`");
            
            while($got_vals = assoc($get_all_trips)){
                
               $id = $got_vals['id'];
               $emp_id = $got_vals['emp_id'];
               $driver_id = $got_vals['driver_id'];
               $driver_name = $got_vals['driver_name'];
               $location_id = $got_vals['location_id'];
               $main_company_name = $got_vals['main_company_name'];
               $sub_company_name = $got_vals['sub_company_name'];
               $loading_date = $got_vals['loading_date'];
               $discharging_date = $got_vals['discharging_date'];
               $waybill_no = $got_vals['waybill_no'];
               $truck_no = $got_vals['truck_no'];
               $truck_id = $got_vals['truck_id'];
               $product = $got_vals['product'];
               $qty = $got_vals['qty'];
               $loading_pt = $got_vals['loading_pt'];
               $discharging_pt = $got_vals['discharging_pt'];
               $distance = $got_vals['distance'];
               $rate = $got_vals['rate'];
               $amount = $got_vals['amount'];
               $shortage = $got_vals['shortage'];
               $shortage_val = $got_vals['shortage_val'];
               $overnight_allowance = $got_vals['overnight_allowance'];
               $amount_due = $got_vals['amount_due'];
               $fuel_consumed = $got_vals['fuel_consumed'];
               $fuel_consumed_in_cash = $got_vals['fuel_consumed_in_cash'];
               $pay_due_kodson = $got_vals['pay_due_kodson'];
               $amt_recievable = $got_vals['amt_recievable'];
               $cash_paid_to_make_loss = $got_vals['cash_paid_to_make_loss'];
               $balance = $got_vals['balance'];
               $receipt_no = $got_vals['receipt_no'];
               $is_done = $got_vals['is_done'];
               $is_inprogress = $got_vals['is_inprogress'];
               $input_date_time = $got_vals['input_date_time'];                                    
                
                
                ////////////////// insert them into trip history table ////////////////////////////////////
                $insert_trips = queryn($vSky, "INSERT INTO `trips_history`(`trip_id`, `emp_id`, `driver_id`, `driver_name`, `location_id`, `main_company_name`, `sub_company_name`, `loading_date`, `discharging_date`, `waybill_no`, `truck_no`, `truck_id`, `product`, `qty`, `loading_pt`, `discharging_pt`, `distance`, `rate`, `amount`, `shortage`, `shortage_val`, `overnight_allowance`, `amount_due`, `fuel_consumed`, `fuel_consumed_in_cash`, `pay_due_kodson`, `amt_recievable`, `cash_paid_to_make_loss`, `balance`, `receipt_no`, `is_done`, `is_inprogress`, `ready_for_printing`, `is_last`, `input_date_time`) VALUES ('".$id."', '".$emp_id."', '".$driver_id."', '".$driver_name."', '".$location_id."', '".$main_company_name."', '".$sub_company_name."', '".$loading_date."', '".$discharging_date."', '".$waybill_no."', '".$truck_no."', '".$truck_id."', '".$product."', '".$qty."', '".$loading_pt."', '".$discharging_pt."', '".$distance."', '".$rate."', '".$amount."', '".$shortage."', '".$shortage_val."', '".$overnight_allowance."', '".$amount_due."', '".$fuel_consumed."', '".$fuel_consumed_in_cash."', '".$pay_due_kodson."', '".$amt_recievable."', '".$cash_paid_to_make_loss."', '".$balance."', '".$receipt_no."', '".$is_done."', '".$is_inprogress."', '1', '1', '".$input_date_time."')");
                
                if($insert_trips){
                    
                    $delete_dah_trip = queryn($vSky, "DELETE FROM `current_trips` WHERE `id`='$id'");
                    
                    }
                }

                if($delete_dah_trip){

                    $data['vSkySuc'] = true;

                }else{

                    $data['vSkySuc'] = false;

                }
            }
        }
    }
    
    echo json_encode($data);
    exit();
}
//////////////////////////////////////// moving trips to history ///////////////////////////////////////////////////
?>