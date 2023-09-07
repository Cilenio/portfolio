<?php
/*
 *  Escreva uma função que receba 3 números
 *  e imprimi-los em ordem decrescente (suponha
 *  números diferentes).
 */

 function ImpressaoDecrescente($numero1, $numero2, $numero3){
    $numeros = array($numero1,$numero2, $numero3);
    rsort($numeros); 
    for($i = 0; $i < Count($numeros); $i++){
        echo $numeros[$i];
    }
 }
 ImpressaoDecrescente(8,1,3);