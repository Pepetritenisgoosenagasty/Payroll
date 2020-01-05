<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if(isset($_POST['vSkyDept'])){
    
    $vSkyDept = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDept'])));
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `department` WHERE `dep_name`='$vSkyDept' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
    
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "INSERT INTO `department`(`dep_name`, `dept_code`) VALUES ('".$vSkyDept."','NULL')");
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

if(isset($_POST['vSkyIdDept'])){
    $vSkyIdDept = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyIdDept'])));
    
    $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `department` WHERE `id`='$vSkyIdDept' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['vSkyDeptDbName'] = $vSkyRow['dep_name'];
        $data['vSkyDeptDbId'] = $vSkyRow['id'];
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['vSkyDeptName']) && isset($_POST['vSkyDeptId'])){
    
    $vSkyDeptName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDeptName'])));
    $vSkyDeptId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDeptId'])));
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `department` WHERE `id`!='$vSkyDeptId' AND `dep_name`='$vSkyDeptName' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
        
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "UPDATE `department` SET `dep_name`='$vSkyDeptName' WHERE `id`='$vSkyDeptId'");

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

if(isset($_POST['vSkyDelDeptId'])){
    
    $vSkyDelDeptId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDelDeptId'])));

    $vSkyStmt = mysqli_query($vSky, "DELETE FROM `department` WHERE `id`='$vSkyDelDeptId'");
    
    if($vSkyStmt){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
    }
?>