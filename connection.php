<?php

// Veri tabanı bağlantısı

$host 		= "localhost";
$dbname 	= "";
$charset 	= "utf8";
$root 		= "root";
$password 	= "";

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
}catch(PDOException $error){
  die($error->getMessage());
}