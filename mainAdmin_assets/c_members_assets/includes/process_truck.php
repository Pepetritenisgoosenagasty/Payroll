<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");

if(isset($_POST['truck'])){
    
    
    $process = mysqli_real_escape_string($vSky, $_POST['truck']);
    $eAmpID = mysqli_real_escape_string($vSky, $_POST['eAmpID']);
    $eAmpName = mysqli_real_escape_string($vSky, $_POST['eAmpName']);
    $eAmpCatName = mysqli_real_escape_string($vSky, $_POST['eAmpCatName']);
    $truckNumber = mysqli_real_escape_string($vSky, $_POST['truckNumber']);
    $input_date = date("Y-m-d");
    $is_as = false;



    if($process == "truck"){
        
    $query = mysqli_query($vSky, "SELECT * FROM `truck` WHERE `truck_no`='$truckNumber' AND (`is_assigned`='1' OR `is_assigned`='0') AND (`is_deleted`='0' OR `is_deleted`='1' ) AND `is_available`='1'");
    $count_truck  = mysqli_num_rows($query);
    


        
        if($count_truck > 0){
            //$data['truck_found'] = "truckNo";

            ////////////////////////////////////// update truck if its found do not display any error message/////////////
            $update_truck = queryn($vSky, "UPDATE `truck` SET `is_deleted`='0' WHERE `truck_no`='$truckNumber'");

            if($update_truck){
                ///////////////////////// get truck id ///////////////////////////////////////////////////////
                $get_truck_id = queryn($vSky, "SELECT `id` FROM `truck` WHERE `truck_no`='$truckNumber' LIMIT 1");
                
                if($get_truck_id = arr($get_truck_id)){
                    $truck_id = $get_truck_id[0];
                }

                $query_update_check = mysqli_query($vSky, "UPDATE `drivers` SET `truck_id`='0', `is_driver`='0' WHERE `truck_id`='$truck_id'");

                if($query_update_check){


                    $get_drivers_info = queryn($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$eAmpID' AND `is_driver`='0'AND `on_trip`='0'");
                    $count_dr = rows($get_drivers_info);
    
                    if($count_dr > 0){
    
                        ////////////////////// reupdate truck to make available ///////////////////////////////////
                        $up = queryn($vSky, "UPDATE `truck` SET `is_available`='1', `emp_id`='$eAmpID', `is_assigned`='0' WHERE `truck_no`='$truckNumber'");
    
                /////////////// update drivers fields with the informations //////////////////////////////////////////////////
                    $query_update_check = mysqli_query($vSky, "UPDATE `drivers` SET `truck_id`='$truck_id', `is_driver`='1' WHERE `driver_emp_id`='$eAmpID'");
    
                        if($query_update_check){
                            
                            $data['vSkySuc'] = true;
                            
                        }else{
                            
                            $data['vSkySuc'] = false;
                            
                        }
                    }
                }
            }
            
            
        }else{

        //////////////// check if driver already is in the drivers table if true update if false insert //////////////////////
        
        $query_check = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$eAmpID' AND `is_driver`='0'");
        $count_check = mysqli_num_rows($query_check);
            
            if($count_check > 0){
                
                $query_insert_truck = mysqli_query($vSky, "INSERT INTO `truck`(`emp_id`, `truck_no`, `is_assigned`, `is_available`, `input_date`) VALUES ('".$eAmpID."', '".$truckNumber."', '0', '1', '".$input_date."')");

            if($query_insert_truck){
            $last_truck_id = mysqli_insert_id($vSky);
            }
            
        /////////////// update drivers fields with the informations //////////////////////////////////////////////////
                $query_update_check = mysqli_query($vSky, "UPDATE `drivers` SET `truck_id`='$last_truck_id', `is_driver`='1' WHERE `driver_emp_id`='$eAmpID'");
                
                if($query_update_check){
                    
                    $data['vSkySuc'] = true;
                    
                }else{
                    
                    $data['vSkySuc'] = false;
                    
                }
                
            }else{
               
                            
            $query_insert_truck = mysqli_query($vSky, "INSERT INTO `truck`(`emp_id`, `truck_no`, `is_assigned`, `is_available`, `input_date`) VALUES ('".$eAmpID."', '".$truckNumber."', '0', '1', '".$input_date."')");

            if($query_insert_truck){
            $last_truck_id = mysqli_insert_id($vSky);
            }


            $query_insert_driver = mysqli_query($vSky, "INSERT INTO `drivers`(`driver_emp_id`, `truck_id`, `driver_name`, `is_available`, `is_driver`,  `input_date`) VALUES ('".$eAmpID."', '".$last_truck_id."', '".$eAmpName."', '1', '1', '".$input_date."')");

            if($query_insert_driver){
                
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

if(isset($_POST['del'])){
    
    $process = mysqli_real_escape_string($vSky, $_POST['del']);
    $emp_id = mysqli_real_escape_string($vSky, $_POST['emp_id']);
    
    if($process == "del"){
        
        /////////////// check if driver exists in the truck table ///////////////////////////////
        $query_check_emp_id = mysqli_query($vSky, "SELECT * FROM `truck` WHERE `emp_id`='$emp_id'");
        $count_emps = mysqli_num_rows($query_check_emp_id);
        
        if($count_emps > 0){
            
        ///////////////////// delete truck with the correct id //////////////////////////////////
        $query_delete_truck = mysqli_query($vSky, "UPDATE `truck` SET `is_deleted`='1', `emp_id`='0' WHERE `emp_id`='$emp_id'");
        //$query_delete_truck = mysqli_query($vSky, "DELETE FROM `truck` WHERE `emp_id`='$emp_id'");
        
            if($query_delete_truck){

                $query_update_driver = mysqli_query($vSky, "UPDATE `drivers` SET `truck_id`='0', `is_driver`='0' WHERE `driver_emp_id`='$emp_id'");

                if($query_update_driver){

                    $data['vSkySuc'] = true;

                }else{

                    $data['vSkySuc'] = false;

                }

            }
            
        }else{
            
                $data['nun'] = "u_nun";
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['un_process'])){
    
    $un_emp_id = mysqli_real_escape_string($vSky, $_POST['un_emp_id']);
    $un_process = mysqli_real_escape_string($vSky, $_POST['un_process']);
    
    if($un_process == "unassign"){
        
        $query_driver = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr INNER JOIN `truck` AS tk ON dr.`driver_emp_id`=tk.`emp_id` WHERE dr.`driver_emp_id`='$un_emp_id' LIMIT 1");
        $driver_truck_count = mysqli_num_rows($query_driver);
        
        if($driver_truck_count > 0){
            
         $update_dr_tk = mysqli_query($vSky, "UPDATE `drivers` dr INNER JOIN `truck` tk ON dr.`driver_emp_id`=tk.`emp_id` 
                                              SET dr.`is_assigned`='0', tk.`is_assigned`='0' WHERE dr.`driver_emp_id`='$un_emp_id'");
            if($update_dr_tk){
                
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
                $data['unassErr'] = "unassErr";
            
        }        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['ass_process'])){
    
    $ass_emp_id = mysqli_real_escape_string($vSky, $_POST['ass_emp_id']);
    $ass_process = mysqli_real_escape_string($vSky, $_POST['ass_process']);
    $ass_date_time = date("Y-m-d h:i:s");
    
    if($ass_process == "assign"){
        
        $query_driver = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr INNER JOIN `truck` AS tk ON dr.`driver_emp_id`=tk.`emp_id` WHERE dr.`driver_emp_id`='$ass_emp_id' LIMIT 1");
        $driver_truck_count = mysqli_num_rows($query_driver);
        
        if($driver_truck_count > 0){
            
         $update_dr_tk = mysqli_query($vSky, "UPDATE `drivers` dr INNER JOIN `truck` tk ON dr.`driver_emp_id`=tk.`emp_id` 
                                              SET dr.`is_assigned`='1', dr.`assigned_date`='$ass_date_time', tk.`is_assigned`='1' WHERE dr.`driver_emp_id`='$ass_emp_id'");
            if($update_dr_tk){
                
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
                $data['assErr'] = "assErr";
            
        }        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['add_process'])){
    
    $add_mate_id = mysqli_real_escape_string($vSky, $_POST['add_mate_id']);
    $add_driver_id = mysqli_real_escape_string($vSky, $_POST['add_driver_id']);
    $add_process = mysqli_real_escape_string($vSky, $_POST['add_process']);
    $mate_in_date = date("Y-m-d");
    
    if($add_process == "add_mate"){
        
        $query_emp = mysqli_query($vSky, "SELECT emp_name FROM `employees` WHERE `emp_id`='$add_driver_id' AND `emp_main_cat_id`='2' LIMIT 1");
        if($get_emp_name = mysqli_fetch_assoc($query_emp)){
            $driver_name = $get_emp_name['emp_name'];
        }
        
        $query_emp_for_mate = mysqli_query($vSky, "SELECT emp_name FROM `employees` WHERE `emp_id`='$add_mate_id' AND `emp_main_cat_id`='3' LIMIT 1");
        if($get_emp_mate_name = mysqli_fetch_assoc($query_emp_for_mate)){
            $mate_name = $get_emp_mate_name['emp_name'];
        }
        
        $query_chk_mate = mysqli_query($vSky, "SELECT * FROM `mates` WHERE `emp_mate_id`='$add_mate_id' AND `is_available`='1'");
        $count_mates = mysqli_num_rows($query_chk_mate);
        
        if($count_mates > 0){
            
            $data['mate_in'] = "mate_in";
            
        }else{
            
        $query_check = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$add_driver_id' AND (`is_driver`='0' OR `is_driver`='1')");
        $count_check = mysqli_num_rows($query_check);
            
            if($count_check > 0){
                
            $insert_mate = mysqli_query($vSky, "INSERT INTO `mates`(`emp_mate_id`, `mate_name`, `is_mate`, `is_assigned`, `is_available`, `input_date`) VALUES ('".$add_mate_id."', '".$mate_name."', '0', '0', '1', '".$mate_in_date."')");
            
            if($insert_mate){
                
                $update_mate_to_driver = mysqli_query($vSky, "UPDATE drivers SET `mate_emp_id`='$add_mate_id', `has_mate`='1', `is_mate_assigned`='0' WHERE `driver_emp_id`='$add_driver_id'");
                
                    if($update_mate_to_driver){
                        $data['vSkySuc'] = true;
                        $data['driver_id'] = $add_driver_id;
                    }else{
                        $data['vSkySucffff'] = false;
                    }
                
                }else{
                    $data['vSkySucfff'] = false;
                }
                
                
            }else{
             
            $insert_mate = mysqli_query($vSky, "INSERT INTO `mates`(`emp_mate_id`, `mate_name`, `is_mate`, `is_assigned`, `is_available`, `input_date`) VALUES ('".$add_mate_id."', '".$mate_name."', '0', '0', '1', '".$mate_in_date."')");
            
            if($insert_mate){
                
                $insert_mate_to_driver = mysqli_query($vSky, "INSERT INTO `drivers`(`driver_emp_id`, `driver_name`, `mate_emp_id`,  `has_mate`, `is_mate_assigned`, `is_available`, `input_date`) VALUES ('".$add_driver_id."', '".$driver_name."', '".$add_mate_id."', '1', '0', '1', '".$mate_in_date."')");
                
                    if($insert_mate_to_driver){
                        $data['vSkySuc'] = true;
                        $data['driver_id2'] = $add_driver_id;
                        
                    }else{
                        $data['vSkySucf'] = false;
                    }
                
                }else{
                    $data['vSkySucff'] = false;
                }
            }
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['del_mate'])){
        $del_mate_id = mysqli_real_escape_string($vSky, $_POST['del_mate_id']);
        $del_mate = mysqli_real_escape_string($vSky, $_POST['del_mate']);
    
        if($del_mate == "del_mate"){
            
            $query_chk_mate = mysqli_query($vSky, "SELECT * FROM `mates` WHERE `emp_mate_id`='$del_mate_id'");
            $c_mate = mysqli_num_rows($query_chk_mate);
            
            if($c_mate > 0){
                
                $query_dr_id = mysqli_query($vSky, "SELECT `driver_emp_id` FROM `drivers` WHERE `mate_emp_id`='$del_mate_id' LIMIT 1");
                if($get_dr_id = mysqli_fetch_array($query_dr_id)){
                    $dr_id = $get_dr_id[0];
                }
                
                $query_up_driver = mysqli_query($vSky, "UPDATE `drivers` SET `mate_emp_id`='0', `has_mate`='0' WHERE `driver_emp_id`='$dr_id'");
                
                if($query_up_driver){
                    
                    $del_mate = mysqli_query($vSky, "DELETE FROM `mates` WHERE `emp_mate_id`='$del_mate_id'");
                    
                    if($del_mate){
                        
                        $data['vSkySuc'] = true;
                        
                    }else{
                        
                        $data['vSkySuc'] = false;
                        
                    }
                    
                }
                
            }else{
                $data['nun'] = "m_nun";
            }
            
        }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['ass_process_mate'])){
    
    $ass_emp_id_dr= mysqli_real_escape_string($vSky, $_POST['ass_emp_id_dr']);
    $ass_process_mate = mysqli_real_escape_string($vSky, $_POST['ass_process_mate']);
    $un_ass_date_time = date("Y-m-d h:i:s");
    
    if($ass_process_mate == "assign_mate"){
        
        $query_driver = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr INNER JOIN `mates` AS mt ON dr.`mate_emp_id`=mt.`emp_mate_id` WHERE dr.`driver_emp_id`='$ass_emp_id_dr' LIMIT 1");
        $driver_truck_count = mysqli_num_rows($query_driver);
        
        if($driver_truck_count > 0){
            
         $update_dr_tk = mysqli_query($vSky, "UPDATE `drivers` dr INNER JOIN `mates` mt ON dr.`mate_emp_id`=mt.`emp_mate_id` 
                                              SET dr.`is_mate_assigned`='1', mt.`is_assigned`='1', mt.`is_mate`='1', mt.`assigned_date_time`='$un_ass_date_time' WHERE dr.`driver_emp_id`='$ass_emp_id_dr'");
            if($update_dr_tk){
                
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
                $data['assErr'] = "assErr";
            
        }        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['un_ass_process_mate'])){
    
    $un_ass_emp_id_dr= mysqli_real_escape_string($vSky, $_POST['un_ass_emp_id_dr']);
    $un_ass_process_mate = mysqli_real_escape_string($vSky, $_POST['un_ass_process_mate']);
    
    if($un_ass_process_mate == "un_assign_mate"){
        
        $query_driver = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr INNER JOIN `mates` AS mt ON dr.`mate_emp_id`=mt.`emp_mate_id` WHERE dr.`driver_emp_id`='$un_ass_emp_id_dr' LIMIT 1");
        $driver_truck_count = mysqli_num_rows($query_driver);
        
        if($driver_truck_count > 0){
            
         $update_dr_tk = mysqli_query($vSky, "UPDATE `drivers` dr INNER JOIN `mates` mt ON dr.`mate_emp_id`=mt.`emp_mate_id` 
                                              SET dr.`is_mate_assigned`='0', mt.`is_assigned`='0', mt.`is_mate`='0' WHERE dr.`driver_emp_id`='$un_ass_emp_id_dr'");
            if($update_dr_tk){
                
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
                $data['assErr'] = "assErr";
            
        }        
    }
    
    echo json_encode($data);
    exit();
}
?>