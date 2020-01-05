<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if(isset($_POST['catVsky']) && isset($_POST{'vSkyPosiName'})){
    
    $vSkyCatSelect = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['catVsky'])));
    $vSkyPositionName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyPosiName'])));
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `positions` WHERE `pos_type_name`='$vSkyPositionName' AND `cat_id`='$vSkyCatSelect' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
    
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "INSERT INTO `positions`(`pos_type_name`, `cat_id`, `pos_code`) VALUES ('".$vSkyPositionName."', '".$vSkyCatSelect."','NULL')");
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

if(isset($_POST['vSkyIdPos'])){
    $vSkyIdPos = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyIdPos'])));
    
    $vSkyStmt = mysqli_query($vSky, "SELECT pos.*, cat.* FROM `positions` AS pos INNER JOIN `main_category`  AS cat ON pos.cat_id=cat.cat_id WHERE pos.`pos_id`='$vSkyIdPos' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['vSkyPosDbName'] = $vSkyRow['pos_type_name'];
        $data['vSkyPosDbId'] = $vSkyRow['pos_id'];
        $data['vSkyCatDbId'] = $vSkyRow['cat_id'];
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['vSkyPosName']) && isset($_POST['vSkyPosId']) && isset($_POST['vSkyPosCat']) && isset($_POST['vSkyCatID'])){
    
    $vSkyPosName = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyPosName'])));
    $vSkyPosId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyPosId'])));
    $vSkyPosCat = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyPosCat'])));
    $vSkyCatID = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyCatID'])));
    
    if($vSkyPosCat == 0){
        $vSkyPosCat = $vSkyCatID;
    }else if($vSkyPosCat != 0){
        $vSkyPosCat = $vSkyPosCat;
    }
    
    $vSkyStmt2 = mysqli_query($vSky, "SELECT * FROM `positions` AS pos INNER JOIN `main_category` AS cat WHERE pos.`pos_id`!='$vSkyPosId' AND pos.`pos_type_name`='$vSkyPosName' AND pos.cat_id='$vSkyPosCat' LIMIT 1");
    $vSkyCount = mysqli_num_rows($vSkyStmt2);
        
    if($vSkyCount == 0){
        
    $vSkyStmt = mysqli_query($vSky, "UPDATE `positions` SET `pos_type_name`='$vSkyPosName', `cat_id`='$vSkyPosCat' WHERE `pos_id`='$vSkyPosId'");

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

if(isset($_POST['vSkyDelPosId'])){
    
    $vSkyDelPosId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyDelPosId'])));

    $vSkyStmt = mysqli_query($vSky, "DELETE FROM `positions` WHERE `pos_id`='$vSkyDelPosId'");
    
    if($vSkyStmt){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
    }
?>