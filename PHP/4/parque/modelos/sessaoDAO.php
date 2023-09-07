<?php
require_once "../db/conexaoBaseDeDados.php";
class sessaoDAO{
    private $tabela = 'sessao';
    public function registarSessao($token, $isValido, $administrador_id){
        $sql = "insert into $this->tabela (token, se_valido, administrador_id) values (:token, :isValido, :administrador_id)";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':token', $token);
        $statement -> bindParam(':isValido', $isValido);
        $statement -> bindParam(':administrador_id', $administrador_id);
        return $statement -> execute();
    }
    public function selecionarSessao($token, $se_valido){
        $sql = "select * from $this->tabela where token=:token and se_valido=:se_valido";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':token', $token);
        $statement -> bindParam(':se_valido', $se_valido);
        $statement -> execute();
        return $statement->fetch();
    }
}
?> 