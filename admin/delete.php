<?php
require('../config.php');


if(isset($_GET['id'])){
    if(!is_numeric($_GET['id']) || $_GET['id'] <= 0){
        header("Location: " . $config_basedir . "404.php");
        exit();
    }else{
        $validproj = intval( $_GET['id'] );
    }
} else{
    // if no id is provided, place a blank form for adding new project
    header("Location: " . $config_basedir . "admin/");
}

if(isset($_SESSION['USERID'])){
    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
    $sql = "DELETE FROM case_studies WHERE id = " . $validproj . ";";
    mysqli_query($db, $sql);
    header("Location: " . $config_basedir . "admin/");
} else{
    header("Location: " . $config_basedir . "admin/");
}
?>