<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if(isset($_POST['catName'])){
    
    $vSkyCatName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['catName'])));
    $vSkyInputDate = date("Y-m-d");
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `main_category` WHERE `cat_name`='$vSkyCatName' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
    
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "INSERT INTO `main_category`(`cat_name`, `cat_code`, `input_date`) VALUES ('".$vSkyCatName."','NULL','".$vSkyInputDate."')");
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

if(isset($_POST['vSkyIdCat'])){
    $vSkyIdCat = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyIdCat'])));
    
    $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_category` WHERE `cat_id`='$vSkyIdCat' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['vSkyCatDbName'] = $vSkyRow['cat_name'];
        $data['vSkyCatDbId'] = $vSkyRow['cat_id'];
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['vSkyCatName']) && isset($_POST['vSkyCatId'])){
    
    $vSkyCatName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyCatName'])));
    $vSkyCatId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyCatId'])));
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `main_category` WHERE `cat_id`!='$vSkyCatId' AND `cat_name`='$vSkyCatName' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
        
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "UPDATE `main_category` SET `cat_name`='$vSkyCatName' WHERE `cat_id`='$vSkyCatId'");

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

if(isset($_POST['vSkyDelId'])){
    
    $vSkyDelId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDelId'])));
    
    $vSkyStmt = mysqli_query($vSky, "DELETE FROM `main_category` WHERE `cat_id`='$vSkyDelId'");
    
    if($vSkyStmt){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
    }
?>