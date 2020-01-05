<?php

function e($v){
    return htmlentities($v, ENT_QUOTES, "UTF-8");
}

function escape($v, $c){
    return mysqli_real_escape_string($v, trim(strip_tags($c)));
}

function queryn($v, $s){
    return mysqli_query($v, $s);
}

function rows($q){
    return mysqli_num_rows($q);
}

function assoc($qr){
    return mysqli_fetch_assoc($qr);
}

function arr($qr){
    return mysqli_fetch_array($qr);
}
?>