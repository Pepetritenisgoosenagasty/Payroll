<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['process'])){
    
    $loadingPtName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['loadingPtName'])));
    $dischargingPtName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['dischargingPtName'])));
    $locRate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['locRate'])));
    $locDistance = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['locDistance'])));
    $locFuel = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['locFuel'])));
    $process = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process'])));
    $inputDateTime = date("Y-m-d h:i:s");
    
    if($process == "add_location"){
        
        $query_chk_loc = mysqli_query($vSky, "SELECT * FROM `locations` WHERE `loading_pt_name`='$loadingPtName' AND `discharging_pt_name`='$dischargingPtName'");
        $c_locs = mysqli_num_rows($query_chk_loc);
        
        if($c_locs > 0){
            
            $data['locFound'] = "locFound";
            
        }else{
            
            $insert_loc = mysqli_query($vSky, "INSERT INTO `locations`(`loading_pt_name`, `discharging_pt_name`, `fuel`, `distance`, `rate`, `input_date_time`) VALUES ('".$loadingPtName."', '".$dischargingPtName."', '".$locFuel."', '".$locDistance."', '".$locRate."', '".$inputDateTime."')");
            
            if($insert_loc){
                $data['vSkySuc'] = true;
            }else{
                $data['vSkySuc'] = false;
            }
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['process_loc'])){
    
        $location_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['location_id'])));
        $process_loc = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process_loc'])));
    
    if($process_loc == "get_loc_info"){
        
        $chk_loc = mysqli_query($vSky, "SELECT * FROM `locations` WHERE `id`='$location_id' LIMIT 1");
        $c_loc = mysqli_num_rows($chk_loc);
        
        if($c_loc > 0){
            
            $f_loc = mysqli_query($vSky, "SELECT * FROM `locations` WHERE `id`='$location_id' LIMIT 1");
                
            while($get_loc_infos = mysqli_fetch_assoc($f_loc)){
                $loc_id = $get_loc_infos['id'];
                $loading_pt_name = $get_loc_infos['loading_pt_name'];
                $discharging_pt_name = $get_loc_infos['discharging_pt_name'];
                $fuel = $get_loc_infos['fuel'];
                $distance = $get_loc_infos['distance'];
                $rate = $get_loc_infos['rate'];
            }
            
            if($f_loc){
                
            $data['id'] = $loc_id;
            $data['loading_pt_name'] = $loading_pt_name;
            $data['discharging_pt_name'] = $discharging_pt_name;
            $data['fuel'] = $fuel;
            $data['distance'] = $distance;
            $data['rate'] = $rate;
                
            $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
            $data['locNotFount'] = "locNotFound";
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['editProcess'])){
    
    $editLoadingPt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editLoadingPt'])));
    $editDischargingPt = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editDischargingPt'])));
    $editrate = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editrate'])));
    $editDistance = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editDistance'])));
    $editFuel = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editFuel'])));
    $editId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editId'])));
    $editProcess = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editProcess'])));
    
    if($editProcess == "edit"){
        
    $f_loc_n = mysqli_query($vSky, "SELECT * FROM `locations` WHERE `id`!='$editId' AND `discharging_pt_name`='$editDischargingPt' LIMIT 1");
    $count_locs = mysqli_num_rows($f_loc_n);
    
    if($count_locs > 0){
        
        $data['locFound'] = "locFound";
        
    }else{
        
    $update_loc = mysqli_query($vSky, "UPDATE `locations` SET `loading_pt_name`='$editLoadingPt', `discharging_pt_name`='$editDischargingPt', `fuel`='$editFuel', `distance`='$editDistance', `rate`='$editrate' WHERE `id`='$editId'");
        
        if($update_loc){

            $data['vSkySuc'] = true;

        }else{

            $data['vSkySuc'] = false;

        }
        
    }
}
    
    echo json_encode($data);
    exit();
}


if(isset($_POST['del_process'])){
    
    $del_process = mysqli_real_escape_string($vSky, $_POST['del_process']);
    $loc_id_del = mysqli_real_escape_string($vSky, $_POST['loc_id_del']);
    
    if($del_process == "del_loc"){
        
        /////////////// check if driver exists in the truck table ///////////////////////////////
        $query_check_loc_id = mysqli_query($vSky, "SELECT * FROM `locations` WHERE `id`='$loc_id_del'");
        $count_locs = mysqli_num_rows($query_check_loc_id);
        
        if($count_locs > 0){
            
        ///////////////////// delete truck with the correct id //////////////////////////////////
        $query_delete_loc = mysqli_query($vSky, "DELETE FROM `locations` WHERE `id`='$loc_id_del'");
        
            if($query_delete_loc){

                $data['vSkySuc'] = true;

            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
                $data['nun'] = "l_nun";
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}
?>
