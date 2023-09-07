<?php

global $conn;

try{
    $conn = new PDO("mysql:host=localhost;dbname=Aluguer_equipamentos", 'root', '');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "conectado com sucesso";

}catch(PDOException $e) {

echo "Conecção Falhada: " . $e->getMessage();

}


?>
































