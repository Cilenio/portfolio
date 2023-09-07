<?php
/*Escreva um algoritmo que imprima 
a tabuada de um número
 */

 function taboadaDoNumero($numero){
    $resultado = 0; 
    for($i = 0;$i < 12; $i++){
        $resultado = $numero * $i;
        echo "$numero * $i = $resultado <br>";
    }
 }
 taboadaDoNumero(2);