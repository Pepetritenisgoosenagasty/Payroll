<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");


if(isset($_POST['tax_emp'])){
    
    $taxt_emp = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['tax_emp'])));
    
    $vSkyStmt = mysqli_query($vSky, "SELECT `employee_%` FROM `ssf` WHERE `active`='1' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['emp_tax_db'] = round( sprintf("%0.3f",$vSkyRow['employee_%']),3);
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['tax_empler'])){
    
    $taxt_emp = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['tax_empler'])));
    
    $vSkyStmt = mysqli_query($vSky, "SELECT `employer_%` FROM `ssf` WHERE `active`='1' LIMIT 1");
    
    if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
        $data['empler_tax_db'] = round( sprintf("%0.3f",$vSkyRow['employer_%']),3);
    }
    echo json_encode($data);
    exit();
}
?>