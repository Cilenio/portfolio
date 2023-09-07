<?php
    require_once '../utils/webservices.php' ;



    $url = "https://jobs.dilla.co.mz/objects-iuo926np9c/wp/v2/";

    $utils = new utilitarios();
    $resposta = $utils->obterDados($url.'posts');

    $conteudo = json_decode($resposta);

    echo $resposta;
?>