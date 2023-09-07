<?php

function algoritimo($numero1, $numero2){
    $ResultadoDaSoma = $numero1 + $numero2;

    if($ResultadoDaSoma > 20){
        $ResultadoDaSoma += 8;
    }else{
        $ResultadoDaSoma -= 5;
    }
    echo "O resultado da soma e: $ResultadoDaSoma";
}
algoritimo(10,11);