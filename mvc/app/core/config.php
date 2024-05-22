<?php 

if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('ROOT', 'http://localhost/testphp/mvc/public');
}else{
    define('ROOT', 'https://info.ghdigitalservices.com.br');
}