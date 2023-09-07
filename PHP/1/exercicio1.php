<?php
$numeros = array(1,2,1,2,5,2,5,2);
$maior =$numeros[0];
$menor = $numeros[0];
$indice = 0;
$MostrarIndice = false;
for($i = 0; $i < Count($numeros); $i++){

        if($numeros[$i] > $maior){
            $maior = $numeros[$i];
            $MostrarIndice = false;
            $indice = $i;            
        }else if($numeros[$i] == $numeros[$indice]){
            $MostrarIndice = true;           
        }
        if($menor > $numeros[$i]){
            $menor = $numeros[$i];
        }
}
echo "Maior: $maior ";
echo "<br> Menor: $menor ";
if($MostrarIndice){
    echo "<br> indice: $indice ";   
}
