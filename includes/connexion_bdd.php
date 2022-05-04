<?php

$host = 'localhost:3303';
$base = 'mission';
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $base, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
}


session_start();

require_once 'fonction.php';
