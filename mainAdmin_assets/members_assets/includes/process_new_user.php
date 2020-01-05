<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if(isset($_POST['process'])){
    $process = mysqli_real_escape_string($vSky, $_POST['process']);
    $catD = mysqli_real_escape_string($vSky, $_POST['catD']);
    
    if($process == "add_u"){
        
        $ouput = "";
        $org_name = '';
        
        $query = mysqli_query($vSky, "SELECT * FROM `employees` WHERE `emp_main_cat_id`='$catD' AND is_pending='0' AND on_leave='0' AND sacked='0'");
        
            while($fetch = mysqli_fetch_assoc($query)){
                $cat_id = $fetch["emp_id"];
                $emp_name = $fetch['emp_name'];

                $qu = mysqli_query($vSky, "SELECT * FROM `users` WHERE `emp_id`='$cat_id'");
                $c = mysqli_num_rows($qu);

                    if($c < 1){
                $ouput .= "<option value='$cat_id'>";
                $ouput .= "$emp_name";
                $ouput .= "</option>"; 
                
                } 
            }
        
        if($query){
          echo $ouput;
        }
        
        exit();
    }
}

if(isset($_POST['pro'])){
    $pro = mysqli_real_escape_string($vSky, $_POST['pro']);
    $emp_id_got= mysqli_real_escape_string($vSky, $_POST['emp_id_got']);
    $pos_name = '';
    $dept_name = '';
    
    if($pro == "get_u"){
        $query3 = mysqli_query($vSky, "SELECT pos.`pos_type_name`, dep.`dep_name` FROM `employees` AS emp 
                                                INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                                                INNER JOIN `department` AS dep ON emp.`emp_dept_id`=dep.`id`
                                                WHERE emp.`emp_id`='$emp_id_got'");
        
        while($getAll = mysqli_fetch_array($query3)){
            $pos_name = $getAll[0];
            $dept_name = $getAll[1];
        }
        
    if($query3){
        $data['pos_name'] = $pos_name;
        $data['dept_name'] = $dept_name;
    }
}
    echo json_encode($data);
    exit();
}

if(isset($_POST['proce'])){
    
    $empsAvail = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['empsAvail'])));
    $e_pwd = mysqli_real_escape_string($vSky, trim(strip_tags(md5($_POST['e_pwd']))));
    $e_c_pwd = mysqli_real_escape_string($vSky, trim(strip_tags(md5($_POST['e_c_pwd']))));
    $e_email = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_email'])));
    $e_c_email = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['e_c_email'])));
    $u_tS = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['u_tS'])));
    $login_date = date("Y-m-d");
    
    if($e_c_pwd != $e_pwd){
        
    $data['pwd_err'] = "pwd_err";
        
    }else{
        
        $query = mysqli_query($vSky, "SELECT * FROM `employees` WHERE `emp_id`='$empsAvail' AND (is_pending = 0 AND sacked = 0 AND on_leave = 0) LIMIT 1");
        
        $getCount = mysqli_num_rows($query);
    
    if($getCount > 0){
        
        $queryn = mysqli_query($vSky, "SELECT `emp_name` FROM `employees` WHERE `emp_id`='$empsAvail' AND (is_pending = 0 AND sacked = 0 AND on_leave = 0) LIMIT 1");
        
        if($getFetch = mysqli_fetch_array($queryn)){
            $emp_name = $getFetch[0];
        }
        
        $query2 = mysqli_query($vSky, "INSERT INTO `users`(`emp_id`, `name`, `email`, `pwd`, `cpwd`, `position`, `ilogin_date`) VALUES ('".$empsAvail."', '".$emp_name."', '".$e_email."', '".$e_pwd."', '".$e_c_pwd."', '".$u_tS."', '".$login_date."')");
        
        if($query2){
            
            $data['vSkySuc'] = "true";
            
        }else{
            
            $data['vSkySuc'] = "false";
            
        }
    }else{
        
    $data['emp_id_err'] = "emp_id_err";
        
    } 
}
    echo json_encode($data);
    exit();
}

if(isset($_POST['u_id'])){
    $u_id = mysqli_real_escape_string($vSky, $_POST['u_id']);
    $procs = mysqli_real_escape_string($vSky, $_POST['del']);
    
    if($procs == "del"){
        
        $query_s = mysqli_query($vSky, "SELECT `emp_id` FROM `users` WHERE `emp_id`='$u_id'");
        $c_get = mysqli_num_rows($query_s);
        
        if($c_get > 0){
        
        $query = mysqli_query($vSky, "DELETE FROM `users` WHERE `emp_id`='$u_id'");
            
            if($query){
                
                $data['vSkySuc'] = true;
                
            }else{
                
                $data['vSkySuc'] = false;
                
            }
            
        }else{
            
            $data['nun'] = "u_nun";
            
        }
        
    }

    echo json_encode($data);
    exit();
}

if(isset($_POST['get_u_id'])){
    
    $emp_u_id = mysqli_real_escape_string($vSky, $_POST['get_u_id']);
    $p = mysqli_real_escape_string($vSky, $_POST['p']);
    $position = "";
    
            if($p == "get_info"){
                
                $query3 = mysqli_query($vSky, "SELECT pos.`pos_type_name`, dep.`dep_name`, cat.`cat_name`, emp.`emp_id`, u.`name`, u.`position` FROM `employees` AS emp 
                INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                INNER JOIN `department` AS dep ON emp.`emp_dept_id`=dep.`id`
                INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                INNER JOIN `users` AS u ON emp.`emp_id`=u.`emp_id`
                WHERE emp.`emp_id`='$emp_u_id'");
                
                while($get_f = mysqli_fetch_assoc($query3)){
                    $cat_name = $get_f['cat_name'];
                    $u_name = $get_f['name'];
                    $dep_name = $get_f['dep_name'];
                    $pos_name = $get_f['pos_type_name'];
                    $u_type = $get_f['position'];
                    $u_id = $get_f['emp_id'];
                    
                    if($u_type  == 1){
                        
                        $position = "Super Admin";
                        
                    }else if($u_type == 2){
                        
                        $position = "Admin";
                        
                    }else if($u_type == 3){
                        
                        $position = "Secretary";
                        
                    }
                }
                
                if($query3){
                    $data['u_category'] = $cat_name;
                    $data['u_name'] = $u_name;
                    $data['u_department'] = $dep_name;
                    $data['u_position'] = $pos_name;
                    $data['c_u_type'] = $position;
                    $data['u_id_id'] = $u_id;
                    $data['vSkySuc'] = true;
                }else{
                    $data['vSkySuc'] = false;
                }    
         }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['prcs'])){

    $process = mysqli_real_escape_string($vSky, $_POST['prcs']);
    $new_userType = mysqli_real_escape_string($vSky, $_POST['sel_type']);
    $curl_u_id = mysqli_real_escape_string($vSky, $_POST['curl_u_id']);
    if($process == "update"){

        $query = mysqli_query($vSky, "UPDATE `users` SET `position`='$new_userType' WHERE `emp_id`='$curl_u_id'");

        if($query){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }

    }else{
        $data['not_ad'] = "nt_ad";
    }

    echo json_encode($data);
    exit();
}
?>