<?php
/*Escreva um algoritmo que leia um número inteiro
 entre 1 e 12 e escreve o mês correspondente. Caso
 o número seja fora desse intervalo, informar que
 não existe mês com este número.
 */
function correspondente($inteiro){
    switch($inteiro){
        case '1': echo "Janeiro";
        case '2': echo "Fevereiro";break;
        case '3': echo "Marco";break;
        case '4': echo "Abril";break;
        case '5': echo "Maio";break;
        case '6': echo "junho";break;
        case '7': echo "Julho";break;
        case '8': echo "Agosto";break;
        case '9': echo "Setembro";break;
        case '10': echo "Outubro";break;
        case '11': echo "Novembro";break;
        case '12': echo "Dezembro";break;
        default: echo "Nao existe mes com este numero";break;
    }
}
correspondente(12);