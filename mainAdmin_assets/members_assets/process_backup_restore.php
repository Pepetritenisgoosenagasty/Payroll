<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_POST['bk'])){
    
    $tables = array();
    $date = date("Y-m-d");
    $result = mysqli_query($vSky, "SHOW TABLES");
    
    while($row = mysqli_fetch_row($result)){
      $tables[] = $row[0];
    }
    
    $return = '';
    foreach($tables as $table){
        
      $result = mysqli_query($vSky, "SELECT * FROM `$table`");
        
      $num_fields = mysqli_num_fields($result);

      $return .= 'DROP TABLE '.$table.';';
      $row2 = mysqli_fetch_row(mysqli_query($vSky,"SHOW CREATE TABLE `$table`"));
      $return .= "\n\n".$row2[1].";\n\n";

      for($i=0;$i<$num_fields;$i++){
          
        while($row = mysqli_fetch_row($result)){
            
          $return .= "INSERT INTO ".$table." VALUES(";
          for($j=0;$j<$num_fields;$j++){
              
            $row[$j] = addslashes($row[$j]);
            if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
              
            else{ $return .= '""';}
              
            if($j<$num_fields-1){ $return .= ',';}
              
          }
          $return .= ");\n";
        }
      }
      $return .= "\n\n\n";
    }
    
    $url = getenv("HOMEDRIVE"). getenv("HOMEPATH");
    $replacedPath = str_replace('\\', '/', $url);
    $dirname1 = $replacedPath."/Documents/payroll_backup";
        
    $dirname = "payroll_backup";

    if(file_exists($dirname1)){
        
    $handle1 = fopen($dirname1."/".$date."-payroll_kodson.sql","w+");
    fwrite($handle1,$return);
    fclose($handle1);
        
    }else{
        
    mkdir("{$dirname1}", 0777);
        
    $handle1 = fopen($dirname1."/".$date."-payroll_kodson.sql","w+");
    fwrite($handle1,$return);
    fclose($handle1);
        
    }
    
    if(file_exists($dirname)){
            
    $handle = fopen($dirname."/".$date."-payroll_kodson.sql","w+");
    fwrite($handle,$return);
    fclose($handle);
            
        }else{
        
    mkdir("{$dirname}", 0777);
        
    $handle = fopen($dirname."/".$date."-payroll_kodson.sql","w+");
    fwrite($handle,$return);
    fclose($handle);
        
        }
    
        $upDate = date("Y-m-d 16:00:00");

        $updateQuery1 = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$upDate' WHERE `active`='1'");
        
        $stmt = mysqli_query($vSky, "SELECT * FROM `payroll_date` WHERE active ='1' LIMIT 1");
        $count = mysqli_num_rows($stmt);
        
        if($count == 1){
            
        $stmt = mysqli_query($vSky, "SELECT * FROM `payroll_date` WHERE active ='1' LIMIT 1");
            
            while($vSkyRow = mysqli_fetch_array($stmt)){
            $id = $vSkyRow['id'];
            $dateIn = $vSkyRow['input_date'];
            $data['indates'] = $vSkyRow['input_date'];
            $auto_man = $vSkyRow['auto_man'];
            $data['vSkySuc'] = true;
                
            }
            
            if($auto_man == 0){
                
            $data['vSkySuc'] = "never";
                
            }else if($auto_man == 1){
                
            $data['vSkySuc'] = "maual";
                
            }else if($auto_man == 2){
                
                $backedupDate = date("Y-m-d");
                
                $newDate = new DateTime($dateIn);
                $dd = $newDate->modify("+1 day");
                
                foreach($dd as $key => $dn){
                    
                if($key == "date"){     
                        
                    $updateQuery = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$dn', `sas`='$backedupDate' WHERE `id`='$id' AND `active`='1'");
                    
                    if($updateQuery){
                        $data['vSkySuc'] = true;
                    }else{
                        $data['vSkySuc'] = false;
                    }
                        
                }   
            }
                
            }else if($auto_man == 3){
                
                $newDate = new DateTime($dateIn);
                $dd = $newDate->modify("+7 day");
                
                foreach($dd as $key => $dn){
                    
                if($key == "date"){
                        
                    $updateQuery = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$dn',`sas`='$backedupDate' WHERE `id`='$id' AND `active`='1'");
                    
                    if($updateQuery){
                        $data['vSkySuc'] = true;
                    }else{
                        $data['vSkySuc'] = false;
                    }
                }
            }
                
        }

        }else{
            $data['vSkySuc'] = false;
        }
    
    echo json_encode($data);
    exit();
}

if(isset($_FILES['restore']) && !empty($_FILES['restore'])){
    $result = 0;
    $dateRestored = date("Y-m-d H-i-s");

    
    if($_FILES['restore']['error'] > 0){
              $result = 0;

    echo "no file selected"." ".$_FILES['restore']['error'];
        
    }else{
        
    $filename = $_FILES['restore']['name'];
   // $dirname = "payroll_backup";
    $url = getenv("HOMEDRIVE"). getenv("HOMEPATH");
    $replacedPath = str_replace('\\', '/', $url);
    $dirname1 = $replacedPath."/Documents/payroll_backup";
        
        //$filename = 'backup.sql';
    $realName = $dirname1. "/" . $filename;
    
    $handle = fopen($dirname1."/".$filename,"r+");
    
    $contents = fread($handle,filesize($realName));
    
    $sql = explode(';',$contents);
    
    foreach($sql as $query){
        
      $result = mysqli_query($vSky,$query);
      
    }
        
    fclose($handle);
        
    $query2 = mysqli_query($vSky, "UPDATE `last_restored` SET `is_last`='0',`is_inUse`='0'");
        
        if($query2){
            
        $query = mysqli_query($vSky, "INSERT INTO `last_restored`(`date_restored`, `is_last`, `is_inUse`) VALUES ('".$dateRestored."','1','1')");
           
          if($query){

          $result = 1;

          } 
    }
    sleep(1);
  }

}


if(isset($_POST['select_val'])){
    
    $vals = mysqli_real_escape_string($vSky, $_POST['select_val']);
    $propt = "";
    $upDate = date("Y-m-d 16:00:00");
    
    $query = mysqli_query($vSky, "UPDATE `payroll_date` SET `active`='0'");
    
    if($query){
    
        if($vals == 0){

            $propt = "never";
            $query = mysqli_query($vSky, "UPDATE `payroll_date` SET `active`='1' WHERE `type`='$propt'");

            if($query){
                    $data['vSkySuc'] = true;
            }else{
                    $data['vSkySuc'] = false;
            }

        }else if($vals == 1){

            $propt = "back_up";
            $query = mysqli_query($vSky, "UPDATE `payroll_date` SET `active`='1' WHERE `type`='$propt'");

            if($query){
                    $data['vSkySuc'] = true;
            }else{
                    $data['vSkySuc'] = false;
            }

        }else if($vals == 2){

            $propt = "daily";
            $backedupDate = date("Y-m-d");

            $updateQuery1 = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$upDate', `active`='1' WHERE `type`='$propt'");

            $newDate = new DateTime($upDate);
            $dd = $newDate->modify("+1 day");

            foreach($dd as $key => $dn){

            if($key == "date"){     

                $updateQuery = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$dn', `sas`='$backedupDate' WHERE `type`='$propt' AND `active`='1'");

                if($updateQuery){
                    $data['vSkySuc'] = true;
                }else{
                    $data['vSkySuc'] = false;
                }

            }   
        }


        }else if($vals == 3){

            $propt = "weekly";
            $backedupDate = date("Y-m-d");

            $updateQuery1 = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$upDate', `active`='1' WHERE `type`='$propt'");

            $newDate = new DateTime($upDate);
            $dd = $newDate->modify("+7 days");

            foreach($dd as $key => $dn){

            if($key == "date"){     

                $updateQuery = mysqli_query($vSky, "UPDATE `payroll_date` SET `input_date`='$dn', `sas`='$backedupDate' WHERE `type`='$propt' AND `active`='1'");

                if($updateQuery){
                    $data['vSkySuc'] = true;
                }else{
                    $data['vSkySuc'] = false;
                }
            }   
        }
    }
        
}
    
    echo json_encode($data);
    exit();
}

?>


<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>   
