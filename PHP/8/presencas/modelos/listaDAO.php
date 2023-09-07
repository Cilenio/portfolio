<?php
    require_once "../bd/conexaoComBd.php";

    class ListaDAO{
        private $tabela = "lista";

        public function registar($nome){
            $sql = "insert into $this->tabela(nome) values(:nome)";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            return $statement -> execute();
        }
        public function selecionarTodos(){
            $sql = "select * from $this->tabela";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll(); 
        }
        public function selecionarLista($id){
            $sql = "select * from $this->tabela where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            $statement -> execute();
            return $statement -> fetch();
        }
    }
?>