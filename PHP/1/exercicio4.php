<?php
$alturas = array(1.4,1.6,1.8);

function determinador($alturas){
    $altos = 0;
    $medios = 0;
    $baixos = 0;

    for($i = 0; $i < count($alturas); $i++){
        if($alturas[$i] > 1.70){
            $altos ++;
        }
        if($alturas[$i] <= 1.70 && $alturas[$i] >= 1.55){
            $medios++;
        }
        if($alturas[$i] < 1.55){
            $baixos++;
        }
    }
    echo "Altos sao: $altos";
    echo "<br> Medios sao: $medios";
    echo "<br> Baixos sao: $baixos";
}
determinador($alturas);