<?php
date_default_timezone_set('Africa/Accra');

    session_start();
    define("DB_HOST","localhost");
    define("DB_USERNAME","root");
    define("DB_PWD","");
    define("DB_DATABASE","payroll_kodson");

   $vSky =  mysqli_connect(DB_HOST, DB_USERNAME, DB_PWD, DB_DATABASE);
    if(!$vSky){
        echo "Error Connecting";
    }

?>