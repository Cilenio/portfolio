<?php
$inteiros = array(1+1+1+2);

function somaDeInteiros($inteiros){
    $soma=0;
    for($i =0;$i<Count($inteiros); $i++){
        $soma += $inteiros[$i];
    }
    return $soma;
}

echo " A SOMA E: "; echo somaDeInteiros($inteiros);