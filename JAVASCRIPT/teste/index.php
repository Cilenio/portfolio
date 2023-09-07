<?php
    $produtos = [
        ["codVenda"=>001, "produto"=>"Leptop","precoUnit"=> 30000, "quantidade"=>7],
        ["codVenda"=>002, "produto"=>"Teclado","precoUnit"=>1000, "quantidade"=>8],
        ["codVenda"=>003, "produto"=>"Mouse","precoUnit"=>600, "quantidade"=>5],
        ["codVenda"=>004, "produto"=>"Router","precoUnit"=> 300, "quantidade"=>3],
        ["codVenda"=>005, "produto"=>"Impressora","precoUnit"=> 10000, "quantidade"=>4],      
    ];;
    echo json_encode($produtos);
?>