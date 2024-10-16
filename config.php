<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
//Configuration variables

/* $dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "portfolio"; */


// $dbhost = "sql3.freesqldatabase.com";
// $dbuser = "sql3735427";
// // $dbpassword = getenv('DB_PSWD');
// $dbpassword = 'kv9Yw7VHzi';
// $dbdatabase = "sql3735427"; 
$dbhost = $_ENV['DBHOST'];
$dbuser = $_ENV['DBUSER'];
$dbpassword = $_ENV['DBPASSWORD'];
$dbdatabase = $_ENV['DBDATABASE'];
$emailpswd = $_ENV['EMAILPASSWORD'];

$config_author = "Gbenga Opeyemi";
// $config_basedir = "https://gbenga.koyeb.app/";

$config_basedir = "http://127.0.0.1/projects/portfolio/";

?>