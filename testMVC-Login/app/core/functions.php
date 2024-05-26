<?php 
function show($f){
    echo "<pre>";
    print_r($f);
    echo "</pre>";
}

function esc($str){
    return htmlspecialchars($str);
}

function redirect($path){
    header("Location: ".ROOT."/".$path);
    die;
}