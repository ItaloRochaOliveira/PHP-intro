<?php 

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "arquivo";
    
    $mysql = new mysqli($localhost, $username, $password, $database);

    if($mysql->connect_errno){
        echo "Falha ao conectar: (" . $mysql->connect_errno . ") " . $mysql->connect_error;
    }

?>