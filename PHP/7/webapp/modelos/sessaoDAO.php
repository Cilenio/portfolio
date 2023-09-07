<?php
    require_once '../db/ConexaoBaseDados.php';

    class SessaoDAO{
        private $tabela = 'sessao';

        public function registarSessao($token, $seValido, $utilizadorId){
            $sql = "insert into $this->tabela (token, se_valido, utilizador_id) values (:token, :seValido, :utilizadorId)";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":token", $token);
            $statement -> bindParam(":seValido", $seValido);
            $statement -> bindParam(":utilizadorId", $utilizadorId);
            return $statement -> execute();
        }

        public function selecionarSessao($token, $seValido){
            $sql = "select * from $this->tabela where token=:token and se_valido=:seValido";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":token", $token);
            $statement -> bindParam(":seValido", $seValido);
            $statement -> execute();
            return $statement->fetch();
        }
    }
?>