<?php
$numerosPositivos = array(1,2,3,4,5,6,7,8,9,10);

function contarPares($numerosPositivos){
    $numeroDePares = 0;
    for($i = 0; $i < Count($numerosPositivos); $i++){
        if($numerosPositivos[$i] % 2 == 0){
            $numeroDePares ++;
            echo $numerosPositivos[$i];
        }
    }
    echo "<br> O numero de pares e: $numeroDePares";
}
contarPares($numerosPositivos);