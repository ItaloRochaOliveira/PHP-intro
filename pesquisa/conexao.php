<?php 

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "veiculos";
    
    $mysqi = new mysqli($localhost, $username, $password, $database);

    if($mysqi->connect_errno){
        echo "Falha ao conectar: (" . $mysqi->connect_errno . ") " . $mysqi->connect_error;
    }

?>