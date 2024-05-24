<?php 
function show($f){
    echo "<pre>";
    print_r($f);
    echo "</pre>";
}

function esc($str){
    return htmlspecialchars($str);
}