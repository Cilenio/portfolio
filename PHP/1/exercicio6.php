<?php
/**
 * Escreva uma função que receba um número 
 * inteiro e informe se ele é divisível por 10, por 5,
 *  por 2 ou se não é divisível por nenhum destes
 */
function divisivel($inteiro){
    if($inteiro % 2 == 0 || $inteiro % 10 == 0
    || $inteiro % 5 == 0){
        echo "Divisivel";
    }else{
        echo "Indivisivel";
    }
}
divisivel(1);