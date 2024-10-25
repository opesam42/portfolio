<?php
require 'vendor/autoload.php';
if(file_exists(__DIR__ . '/.env')){
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}
//Configuration variables

$dbhost = $_ENV['DBHOST'];
$dbuser = $_ENV['DBUSER'];
$dbpassword = $_ENV['DBPASSWORD'];
$dbdatabase = $_ENV['DBDATABASE'];
$emailpswd = $_ENV['EMAILPASSWORD'];

$config_author = "Gbenga Opeyemi";
if ($_SERVER['SERVER_NAME'] == "127.0.0.1"){
    $config_basedir = "http://127.0.0.1/projects/portfolio/";
}else{
    $config_basedir = "https://gbenga.koyeb.app/";
}

?>