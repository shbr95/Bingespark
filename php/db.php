<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = $_SERVER['REMOTE_ADDR'];

if($server == "127.0.0.1" || $server == "::1") {
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "bingespark";
    $mysqli = new mysqli($host, $user, $pw, $db);
}else{
    $host = "sbrocklehurst01.webhosting6.eeecs.qub.ac.uk";
    $user = "sbrocklehurst01";
    $pw = "YZCNVtzdwCrLB0NN";
    $db = "sbrocklehurst01";
    $mysqli = new mysqli($host, $user, $pw, $db);  
}

$mysqli->set_charset('utf8mb4');
mysqli_set_charset($mysqli, 'utf8mb4');


//mysqli api library in PHP to connect to the DB


if($mysqli->connect_error){
    echo "Connection failed: ".$conn->connect_error;
}

