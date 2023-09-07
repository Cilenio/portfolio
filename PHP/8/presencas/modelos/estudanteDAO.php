<?php
    require_once "../bd/conexaoComBd.php";

    class EstudanteDAO{
        private $tabela = "estudante";

        public function registar($nome, $sobreNome, $sexo, $endereco, $turma_id){
            $sql = "insert into $this->tabela(nome, sobrenome, sexo, endereco, turma_id) values(:nome, :sobreNome, :sexo, :endereco, :turma_id)";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":sobreNome", $sobreNome);
            $statement -> bindParam(":sexo", $sexo);
            $statement -> bindParam(":sobreNome", $sobreNome);
            $statement -> bindParam(":endereco", $endereco);
            $statement -> bindParam(":turma_id", $turma_id);

            return $statement -> execute();
        }

        public function selecionarTodos(){
            $sql = "select * from $this->tabela";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll(); 
        }
        public function actualizarEstudante($id, $nome, $sobreNome, $sexo, $endereco){
            $sql = "update $this->tabela set nome=:nome, sobrenome=:sobreNome, sexo=:sexo, endereco=:endereco where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":sobreNome", $sobreNome);
            $statement -> bindParam(":sexo", $sexo);
            $statement -> bindParam(":endereco", $endereco);
            $statement -> bindParam(":id", $id);

            return $statement -> execute();
        }
        public function delete($id){
            $sql = "delete from $this->tabela where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            return $statement -> execute();
        }
        public function selecionarEstudante($id){
            $sql = "select * from $this->tabela where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            $statement -> execute();
            return $statement -> fetch();
        }

        public function selecionarEstudantePelaIdDaTurma($id){
            $sql = "select * from $this->tabela where turma_id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            $statement -> execute();
            return $statement -> fetchAll();
        }

        public function selecionarTurmaEstudante($id){
            $sql = "select * from $this->tabela  where id=:id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            $statement -> execute();
            return $statement -> fetch();
        }
    }
?>