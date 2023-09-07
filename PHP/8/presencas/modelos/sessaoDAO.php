<?php
    require_once "../bd/conexaoComBd.php";

    class SessaoDAO{
        private $tabela = "sessao";

        public function registarSessao($token, $seValido, $administradorId){
            $sql = "insert into $this->tabela (token, se_valido, administrador_id) values (:token, :seValido, :administradorId)";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":token", $token);
            $statement -> bindParam(":seValido", $seValido);
            $statement -> bindParam(":administradorId", $administradorId);
            return $statement -> execute();
        }
        public function selecionarSessao($token, $seValido){
            $sql = "select * from $this->tabela where token=:token and se_valido=:seValido";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":token", $token);
            $statement -> bindParam(":seValido", $seValido);
            $statement -> execute();
            return $statement->fetch();
        }
    }
?>