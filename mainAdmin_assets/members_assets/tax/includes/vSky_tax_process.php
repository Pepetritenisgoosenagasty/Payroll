<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['values_top']) && isset($_POST['values_down']) ){
    $vSkyProcess = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['process'])));
    $vSkyValuesTop = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['values_top'])));
    $vSkyValuesDown = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['values_down'])));
    
    $vSkyTotl = $vSkyValuesTop+$vSkyValuesDown;
    
    if($vSkyProcess == "add"){
        $vSkyStmt = mysqli_query($vSky, "INSERT INTO `ssf`(`employee_%`, `employer_%`, `total`) VALUES ('".$vSkyValuesTop."','".$vSkyValuesDown."',$vSkyTotl)");
        
        if($vSkyStmt){
            $data['vSkySuc'] = true;
        }else{
            $data['vSkySuc'] = false;
        }
        echo json_encode($data);
    } 
}

if(isset($_POST['id']) && !empty($_POST['id']))
{
    $vSkyId = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['id'])));
    define("PERCENTAGE", 100);

    
    $vSkyQuery = mysqli_query($vSky, "SELECT * FROM `ssf` WHERE `ssf_id`='$vSkyId'");
    while($vSkyRow = mysqli_fetch_array($vSkyQuery)){
        $vSkyEmployee = $vSkyRow['employee_%'];
        $vSkyEmployer = $vSkyRow['employer_%'];
        $vSkyTotal = $vSkyRow['total'];
        $vSkyId = $vSkyRow['ssf_id'];
    }
    
    $vSkyConvVal1 = $vSkyEmployee*PERCENTAGE;
    $vSkyConvVal2 = $vSkyEmployer*PERCENTAGE;
    $vSkyConvTotal = $vSkyTotal*PERCENTAGE;
    
    if($vSkyQuery){
        $data['mainEmp'] = $vSkyEmployee;
        $data['mainEmpl'] = $vSkyEmployer;
        $data['convEmp'] = $vSkyConvVal1;
        $data['convEmpl'] = $vSkyConvVal2;
        $data['convTotal'] = $vSkyConvTotal;
        $data['vSkyId'] = $vSkyId;
    }
    echo json_encode($data);
    exit();
}


if(isset($_POST['vSkyEmpID']) && !empty($_POST['vSkyEmpID'])){
        $vSkyEmpConv = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyEmpConv']))); 
        $vSkyEmplerConv = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyEmplerConv'])));
        $vSkyConvTotal = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['vSkyConvTotal'])));
        $vSkyId = mysqli_real_escape_string($vSky, $_POST['vSkyEmpID']);
    
    $vSkyStmt = mysqli_query($vSky, "UPDATE `ssf` SET `employee_%`='$vSkyEmpConv',`employer_%`='$vSkyEmplerConv',`total`='$vSkyConvTotal' WHERE `ssf_id`='$vSkyId'");
    
    if($vSkyStmt){
        $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `ssf` WHERE `ssf_id`='$vSkyId' LIMIT 1");
        if($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
            $data['vSkyEmpOrg'] = $vSkyRow['employee_%'];
            $data['vSkyEmplerOrg'] = $vSkyRow['employer_%'];
            $data['vSkyTot'] = $vSkyRow['total'];
        }
        $data['vSkySuc'] = true;
    }else{
        $data['vSkySuc'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['vSkyDelId']) && !empty($_POST['vSkyDelId'])){
    $vSkyDelId = mysqli_real_escape_string($vSky, $_POST['vSkyDelId']);
    $vSkyStmt = mysqli_query($vSky, "DELETE FROM `ssf` WHERE `ssf_id`='$vSkyDelId'");
    if($vSkyStmt){
        $data['vSkyDel'] = true;
    }else{
        $data['vSkyDel'] = false;
    }
    echo json_encode($data);
    exit();
}

if(isset($_POST['activate_ssf'])){
    
        $ssFIDDS = mysqli_real_escape_string($vSky, trim(strip_tags($_POST['ssFIDDS'])));
    
        if($_POST['activate_ssf'] == "activate_ssf"){
            $deactivate_ssf = mysqli_query($vSky, "SELECT * FROM `ssf` WHERE `active`='1'");
            $cout = mysqli_num_rows($deactivate_ssf);
            
            if($cout > 0){
            $activate_ssf = mysqli_query($vSky, "UPDATE `ssf` SET `active`='0'");
                if($activate_ssf){
            $activate_ssf = mysqli_query($vSky, "UPDATE `ssf` SET `active`='1' WHERE `ssf_id`='$ssFIDDS'");
                }
            }
            
            if($activate_ssf){
                $data['vSkySuc'] = true.mysqli_error($vSky);
            }else{
                $data['vSkySuc'] = false.mysqli_error($vSky);
            }
            
        }
    echo json_encode($data);
    exit();
}

if(isset($_POST['produce'])){
    
    $chrg_income = $_POST['chrg_income'];
    $rates = $_POST['rates'];
    $tax_cum = $_POST['tax_cum'];
    $tax = $_POST['tax'];
    $ids = $_POST['ids'];
    $dateIn = date("Y-m-d H:i:s");
    $tinyErr = array();    
    $tinySuc = array();    
    
    $truncate_table = mysqli_query($vSky, "TRUNCATE `payroll_kod`.`taxes`");
    
    if($truncate_table){
          for($i = 0; $i < count($ids); $i++){
              
        $insert_q = mysqli_query($vSky, "INSERT INTO `taxes`(`chargeable_income`, `rate`, `tax`, `cumulative_chargeable_income`, `insertDateTime`) VALUES ('".$chrg_income[$i]."', '".$rates[$i]."', '".$tax[$i]."', '".$tax_cum[$i]."', '".$dateIn."')");
        
            if($insert_q){
                
                $tinySuc[] = $ids[$i];
                
            }else{
                
                $tinyErr[] = $ids[$i];
                
            }
        } 
    }

    
    if(count($tinyErr) < 1){
        
        $data['vSkySuc'] = true;
        
    }else{
        
        $data['vSkySuc'] = false;
        
    }
    
    echo json_encode($data);
    exit();
}
?>
