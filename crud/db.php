<?php
$dsn = 'mysql:host=localhost;dbname=crud_db;port=3306';
$username = 'root'; 
$password = 'hhma2005'; 

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}