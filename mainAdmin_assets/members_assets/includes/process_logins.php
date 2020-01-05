<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");



if(isset($_POST['n']) && !empty($_POST['n']) && isset($_POST['p']) && !empty($_POST['p'])){
    
    $n = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['n'])));
    $p = mysqli_real_escape_string($vSky, trim(strip_tags(md5($_POST['p']))));
    
    $data['name'] =$n;
    $data['pwd'] =$p;
    
    $query = mysqli_query($vSky, "SELECT * FROM `users` WHERE `name`='".strtoupper($n)."' AND `pwd`='$p' LIMIT 1");
    $count = mysqli_num_rows($query);
    
    if($count == 1){
        $query_get = mysqli_query($vSky, "SELECT * FROM `users` WHERE `name`='".strtoupper($n)."' AND `pwd`='$p' LIMIT 1");
        while($fetch = mysqli_fetch_assoc($query_get)){
            $position = $fetch['position'];
            $id = $fetch['id'];
            $emp_id = $fetch['emp_id'];
            $name = $fetch['name'];
        }
        
        $count2 = mysqli_num_rows($query_get);
        
        if($count2 == 1){
            $_SESSION['position'] = $position;
            $_SESSION['id'] = $id;
            $_SESSION['emp_id'] = $emp_id;
            $_SESSION['name'] = $name;
            $_SESSION['date'] = date("Y-m-d");
            
            $sub_query = mysqli_query($vSky, "INSERT INTO `login_details`(`user_id`)VALUES('".$emp_id."')");
            $lastInsertId = mysqli_insert_id($vSky);
            
            $_SESSION['login_details_id'] = $lastInsertId;
            
        }else{
            
            $data['pwd_user_error'] ="pwdusderr";
            
        }
            
    if($query_get){
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
        
    }else{
        $data['user_not_found'] = "user_not_found";
    }

    
    echo json_encode($data);
    exit();
}
?>