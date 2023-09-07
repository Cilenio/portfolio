<?php
    require_once "../bd/conexaoComBd.php";
    class TurmaDAO{
        private $tabela = "turma";

        public function registar($nome, $turno){
            $sql = "insert into $this->tabela (nome, turno) values(:nome, :turno)";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":turno", $turno);
    
            return $statement -> execute();
        }

        public function selecionarTodos(){
            $sql = "select * from $this->tabela";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll(); 
        }
        public function selecionarTurma($id){
            $sql = "select * from $this->tabela where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            $statement -> execute();
            return $statement -> fetch();
        }
    }
?>