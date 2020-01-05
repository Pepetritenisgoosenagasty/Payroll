<?php

if(isset($_SESSION['position'])){
    $position = $_SESSION['position'];
    
if($position == 1){
    
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/mainAdmin_assets/members_assets/view/admin_v/nav_sec.php");
    
    }else if($position == 2){

    include($_SERVER["DOCUMENT_ROOT"]."/payroll/mainAdmin_assets/members_assets/view/admin_v/admin_nav.php");

    }else if($position == 3){

    include($_SERVER["DOCUMENT_ROOT"]."/payroll/mainAdmin_assets/c_members_assets/view/controller_v/c_nav_sec.php");
    
    }
}

?>