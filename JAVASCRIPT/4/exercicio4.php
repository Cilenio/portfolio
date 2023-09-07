<?php 

    $trabalhadores = [
        ["nuit"=> 1000,"inss"=> 5000,"nome"=> "Cilenio Jose Magule", "sexo"=>"Masculino", "profissao"=>"Negociante", "salario"=>500000, "subcidio"=>9984999,"bonus"=>192939],
        ["nuit"=> 1001,"inss"=> 5001,"nome"=> "Natacha da Cintia", "sexo"=>"Femenino", "profissao"=>"Assistente Pessoal", "salario"=>98000, "subcidio"=>37000,"bonus"=>200000],
        ["nuit"=> 1002,"inss"=> 5002,"nome"=> "Cleiton Jose", "sexo"=>"Masculino", "profissao"=>"Gestor", "salario"=>250000, "subcidio"=>90000,"bonus"=>30000],
        ["nuit"=> 1003,"inss"=> 5003,"nome"=> "Pedro Cossa", "sexo"=>"Masculino", "profissao"=>"Discursante Publico", "salario"=>90000, "subcidio"=>100,"bonus"=>19000],
        ["nuit"=> 1004,"inss"=> 5004,"nome"=> "Constatino Junio", "sexo"=>"Masculino", "profissao"=>"Eletrecista", "salario"=>78000, "subcidio"=>877,"bonus"=>2099],
        ["nuit"=> 1005,"inss"=> 5005,"nome"=> "August Domis", "sexo"=>"Masculino", "profissao"=>"Comerciante", "salario"=>330000, "subcidio"=>30000,"bonus"=>500000],
        ["nuit"=> 1006,"inss"=> 5006,"nome"=> "Nelsa Zaque", "sexo"=>"Femenino", "profissao"=>"Fachineira", "salario"=>12000, "subcidio"=>400,"bonus"=>20000],
        ["nuit"=> 1007,"inss"=> 5007,"nome"=> "Deolinda Cumbane", "sexo"=>"Femenino", "profissao"=>"Cabelereira", "salario"=>25999, "subcidio"=>200,"bonus"=>100]
    ];

    echo json_encode($trabalhadores);

?>