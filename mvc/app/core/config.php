<?php 

if($_SERVER['SERVER_NAME'] == 'localhost'){
    // databse config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '1234');
    define('DBDRIVER', '');
    define('DBPORT', '3306');

    // define('ROOT', 'http://localhost/testphp/mvc/public');
}else{
    define('ROOT', 'https://info.ghdigitalservices.com.br');
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '1234');
    define('DBDRIVER', '');
}

define('APP_NAME', 'My Website');
define('APP_DESC', 'The desc');

/* true means show errors */
define('DEBUG', true);