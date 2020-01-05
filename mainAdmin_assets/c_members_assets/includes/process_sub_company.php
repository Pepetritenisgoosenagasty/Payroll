<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['process_sub_com'])){
    
    $subComName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['subComName'])));
    $com_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['comId'])));
    $ttPresentedTo = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ttPresentedTo'])));
    $ttMaincomName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ttMaincomName'])));
    $ttLocation = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ttLocation'])));
    $ttComTel = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ttComTel'])));
    $process_sub_com = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process_sub_com'])));
    $inputDateTime = date("Y-m-d h:i:s");
    
    if($process_sub_com == "add_sub_com"){
        
        $query_chk_com = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `sub_name`='$subComName' AND `main_company_id`='$com_id'");
        $c_coms = mysqli_num_rows($query_chk_com);
        
        if($c_coms > 0){
            
            $data['sub_com_found'] = "sub_com_found";
            
        }else{
            
            $insert_com = mysqli_query($vSky, "INSERT INTO `sub_companies`(`sub_name`, `main_company_id`, `transporter`, `t_main_name`, `t_address`, `t_tel`, `input_date_time`) VALUES ('".$subComName."', '".$com_id."', '".$ttPresentedTo."', '".$ttMaincomName."', '".$ttLocation."', '".$ttComTel."', '".$inputDateTime."')");
            
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

if(isset($_POST['pro_dis_sub_com'])){
    
        $dis_sub_com = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['dis_sub_com'])));
        $pro_dis_sub_com = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['pro_dis_sub_com'])));
    
    if($pro_dis_sub_com == "dis_process"){
        
        $chk_com = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `id`='$dis_sub_com' LIMIT 1");
        $c_com = mysqli_num_rows($chk_com);
        
        if($c_com > 0){
            
            $f_com = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `id`='$dis_sub_com' LIMIT 1");
                
            while($get_com_infos = mysqli_fetch_assoc($f_com)){
                $sub_com_id = $get_com_infos['id'];
                $sub_com_name = $get_com_infos['sub_name'];
                $ettPresentedTo = $get_com_infos['transporter'];
                $ettMaincomName = $get_com_infos['t_main_name'];
                $ettLocation = $get_com_infos['t_address'];
                $ettComTel = $get_com_infos['t_tel'];
                $com_id = $get_com_infos['main_company_id'];
            }
            
            if($f_com){
                
            $data['sub_com_id'] = $sub_com_id;
            $data['sub_com_name'] = $sub_com_name;
            $data['ettPresentedTo'] = $ettPresentedTo;
            $data['ettMaincomName'] = $ettMaincomName;
            $data['ettLocation'] = $ettLocation;
            $data['ettComTel'] = $ettComTel;
            $data['com_id'] = $com_id;
                
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
    
    $vSkyCom = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyCom'])));
    $vSkyEditSubComName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyEditSubComName'])));
    $ettPresentedTo = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ettPresentedTo'])));
    $ettMaincomName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ettMaincomName'])));
    $ettLocation = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ettLocation'])));
    $ettComTel = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ettComTel'])));
    $vSkySubComId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkySubComId'])));
    $vSkyComId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyComId'])));
    $editComProcess = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['editComProcess'])));
    
    if($editComProcess == "edit"){

            if($vSkyCom == 0){

                $f_com_n = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `id`!='$vSkySubComId' AND `sub_name`='$vSkyEditSubComName' AND `main_company_id`='$vSkyComId' LIMIT 1");

                $count_coms = mysqli_num_rows($f_com_n);

                    if($count_coms > 0){

                    $data['comFound'] = "comFound";


                        }else{

                    
                    $update_com = mysqli_query($vSky, "UPDATE `sub_companies` SET `sub_name`='$vSkyEditSubComName', `transporter`='$ettPresentedTo', `t_main_name`='$ettMaincomName', `t_address`='$ettLocation', `t_tel`='$ettComTel' WHERE `id`='$vSkySubComId'");

                    if($update_com){

                        $data['vSkySuc'] = true;

                            }else{

                        $data['vSkySuc'] = "false";

                    }
                }
                

            }else{

                $f_com_n = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `id`!='$vSkySubComId' AND `sub_name`='$vSkyEditSubComName' AND `main_company_id`='$vSkyCom' LIMIT 1");

                    $count_coms = mysqli_num_rows($f_com_n);

                if($count_coms > 0){

                    $data['comFound'] = "comFound";

                }else{

                    $update_com = mysqli_query($vSky, "UPDATE `sub_companies` SET `sub_name`='$vSkyEditSubComName', `main_company_id`='$vSkyCom', `transporter`='$ettPresentedTo', `t_main_name`='$ettMaincomName', `t_address`='$ettLocation', `t_tel`='$ettComTel' WHERE `id`='$vSkySubComId'");

                if($update_com){

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


if(isset($_POST['del_process'])){
    
    $del_process = mysqli_real_escape_string($vSky, $_POST['del_process']);
    $sub_com_id_del = mysqli_real_escape_string($vSky, $_POST['sub_com_id_del']);
    
    if($del_process == "del_sub_com"){
        
        /////////////// check if driver exists in the truck table ///////////////////////////////
        $query_check_com_id = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `id`='$sub_com_id_del'");
        $count_coms = mysqli_num_rows($query_check_com_id);
        
        if($count_coms > 0){
            
        ///////////////////// delete truck with the correct id //////////////////////////////////
        $query_delete_com = mysqli_query($vSky, "DELETE FROM `sub_companies` WHERE `id`='$sub_com_id_del'");
        
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
