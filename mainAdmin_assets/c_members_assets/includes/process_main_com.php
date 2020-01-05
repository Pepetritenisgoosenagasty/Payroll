<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");

if(isset($_POST['process_com'])){
    
    $comName = escape($vSky, $_POST['comName']);
    $presentedTo = escape($vSky, $_POST['presentedTo']);
    $mainComName = escape($vSky, $_POST['mainComName']);
    $comLocation = escape($vSky, $_POST['comLocation']);
    $comTel = escape($vSky, $_POST['comTel']);
    $process_com = escape($vSky, $_POST['process_com']);
    $inputDateTime = date("Y-m-d h:i:s");
    
    if($process_com == "add_main_com"){
        
        $query_chk_com = queryn($vSky, "SELECT * FROM `main_companies` WHERE `name`='$comName' AND `is_deleted`='0'");
        $c_coms = rows($query_chk_com);
        
        if($c_coms > 0){
            
            $data['com_found'] = "com_found";
            
        }else{
            
        $insert_com = queryn($vSky, "INSERT INTO `main_companies`(`name`, `main_name`, `presented_to`, `tel`, `location`, `input_date_time`) VALUES ('".$comName."', '".$mainComName."', '".$presentedTo."', '".$comTel."', '".$comLocation."', '".$inputDateTime."')");
            
            if($insert_com){
                $data['vSkySuc'] = true;
            }else{
                $data['vSkySuc'] = false;
            }
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['pro_dis_com'])){
    
        $dis_com_id = escape($vSky, $_POST['dis_com_id']);
        $pro_dis_com = escape($vSky, $_POST['pro_dis_com']);
    
    if($pro_dis_com == "dis_process"){
        
        $chk_com = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$dis_com_id' AND `is_deleted`='0' LIMIT 1");
        $c_com = rows($chk_com);
        
        if($c_com > 0){
            
            $f_com = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$dis_com_id' AND `is_deleted`='0' LIMIT 1");
                
            while($get_com_infos = assoc($f_com)){
                $com_id = $get_com_infos['id'];
                $com_name = $get_com_infos['name'];
                $edtPresentedTo = $get_com_infos['presented_to'];
                $editMaincomName = $get_com_infos['main_name'];
                $edtLocation = $get_com_infos['location'];
                $edtComTel = $get_com_infos['tel'];
            }
            
            if($f_com){
                
            $data['com_id'] = $com_id;
            $data['com_name'] = $com_name;
            $data['edtPresentedTo'] = $edtPresentedTo;
            $data['editMaincomName'] = $editMaincomName;
            $data['edtLocation'] = $edtLocation;
            $data['edtComTel'] = $edtComTel;
                
            $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
            $data['comNotFound'] = "comNotFound";
            
        }
        
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['editComProcess'])){
    
    $editComName = escape($vSky, $_POST['editComName']);
    $edtPresentedTo = escape($vSky, $_POST['edtPresentedTo']);
    $editMaincomName = escape($vSky, $_POST['editMaincomName']);
    $edtLocation = escape($vSky, $_POST['edtLocation']);
    $edtComTel = escape($vSky, $_POST['edtComTel']);
    $editComId = escape($vSky, $_POST['editComId']);
    $editProcess = escape($vSky, $_POST['editComProcess']);
    
    if($editProcess == "edit"){
        
    $f_com_n = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`!='$editComId' AND `name`='$editComName' AND `is_deleted`='0' LIMIT 1");
    $count_coms = rows($f_com_n);
    
    if($count_coms > 0){
        
        $data['comFound'] = "comFound";
        
    }else{
        
    $update_com = queryn($vSky, "UPDATE `main_companies` SET `name`='$editComName', `presented_to`='$edtPresentedTo', `main_name`='$editMaincomName', `location`='$edtLocation', `tel`='$edtComTel' WHERE `id`='$editComId'");
        
        if($update_com){

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
    
    $del_process = escape($vSky, $_POST['del_process']);
    $com_id_del = escape($vSky, $_POST['com_id_del']);
    
    if($del_process == "del_com"){
        
        /////////////// check if driver exists in the truck table ///////////////////////////////
        $query_check_com_id = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$com_id_del' AND `is_deleted`='0'");
        $count_coms = rows($query_check_com_id);
        
        if($count_coms > 0){
            
        ///////////////////// delete truck with the correct id //////////////////////////////////
        $query_delete_com = queryn($vSky, "UPDATE `main_companies` SET `is_deleted`='1' WHERE `id`='$com_id_del'");
        
            if($query_delete_com){

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
