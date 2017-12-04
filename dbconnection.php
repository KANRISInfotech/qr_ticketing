<?php
function getConnection(){
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "rtrsuncity";
    $conn = new mysqli($server, $user, $pass, $dbname);
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);      
    }else{
        return $conn;
    }
}
?>