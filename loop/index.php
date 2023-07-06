<?php 
    $nomes = ["João", "Maria", "Pedro", "Zé"];

    for($k = 0; $k < 4; $k++) {
        echo "<p>" . $nomes[$k] . "</p>";
    }

    $nomes = array(
        "a" => "João", 
        "b" => "Maria", 
        "c" => "Pedro", 
        "d" => "Zé"
    );

    foreach($nomes as $i => $nome){
        echo "<p> O indice é: " . $i . " e o nome é" . $nome . "</p>";
    }
    