<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['curl_pwd']) && isset($_POST['new_pwd']) && isset($_POST['pd_id'])){
    
    $vSkypd_id = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['pd_id'])));
    $vSkyusd = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['usd'])));
    $vSkycurl_pwd = mysqli_real_escape_string($vSky, md5($_POST['curl_pwd']));
    $vSkynew_pwd = mysqli_real_escape_string($vSky, md5($_POST['new_pwd']));
    $vSkyrepeat_pwd = mysqli_real_escape_string($vSky, md5($_POST['repeat_pwd']));
    
    
    $find_user = mysqli_query($vSky, "SELECT * FROM `users` WHERE `id`='$vSkypd_id' LIMIT 1");
    $count = mysqli_num_rows($find_user);
    if($count == 1){
        
        $get_user_info = mysqli_query($vSky, "SELECT * FROM `users` WHERE `id`='$vSkypd_id' LIMIT 1");
        while($fetch_infos = mysqli_fetch_assoc($get_user_info)){
            $vSkyemp_id = $fetch_infos['emp_id'];
            $vSky_name = $fetch_infos['name'];
            $vSky_email = $fetch_infos['email'];
            $vSky_pwd = $fetch_infos['pwd'];
            $vSky_cpwd = $fetch_infos['cpwd'];
            $vSky_position = $fetch_infos['position'];
        }
        
        if($vSky_pwd != $vSkycurl_pwd){
            
            $data['curlPwdNtMatch'] = "curlPwdNtMatch";
            
        }else if($vSky_pwd == $vSkycurl_pwd){
            
            if($vSkyrepeat_pwd != $vSkynew_pwd){
                
                $data['new_pwd_not_match'] = "new_pwd_not_match";
                
            }else if($vSkyrepeat_pwd == $vSkynew_pwd){
                
                $update_pwd = mysqli_query($vSky, "UPDATE `users` SET `name`='".strtoupper($vSkyusd)."', `pwd`='$vSkynew_pwd', `cpwd`='$vSkyrepeat_pwd' WHERE `id`='$vSkypd_id'");
                
                if($update_pwd){
                    $data['vSkySuc'] = true;
                }else{
                    $data['vSkySuc'] = false;
                }
            }
            
        }
    }else{
        $data['user_not_found'] = "user_not_found";
    }
    echo json_encode($data);
    exit();
}


?>
