<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

// Veri tabanı bağlantısı

$host 		= "localhost";
$dbname 	= "todo";
$charset 	= "utf8";
$root 		= "root";
$password = "";

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
}catch(PDOException $error){
  die($error->getMessage());
}



