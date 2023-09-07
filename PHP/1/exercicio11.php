<?php
/*Escrever um algoritmo que recebe um array de 
20 números e imprimi a soma dos positivos
e o total de números negativos.
 */
function imprimir($numeros){
    $totalNegativos = 0;
    $somaDosPositivos = 0;
    for($i = 0; $i < count($numeros); $i++){
        if($numeros[$i] >= 0 ){
            $somaDosPositivos += $numeros[$i];
        }else{
            $totalNegativos++;
        }
    }
    echo "<br> A soma dos positivos e: $somaDosPositivos";
    echo "<br> O total dos negativos e: $totalNegativos";
}
$numeros = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,-18,-19,-20);
imprimir($numeros);