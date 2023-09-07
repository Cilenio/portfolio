<?php
    require_once "../db/ConexaoBaseDados.php";
    
    class utilizadorDAO{
        private $tabela = "utilizadors";
        public function registar($nome, $email, $senha){
            $sql = "insert into $this->tabela(nome, email, senha) values(:nome, :email, :senha)";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":senha", $senha);

            return $statement -> execute();
        }
        public function selecionarTodos(){
            $sql = "select * from $this->tabela";
            $statement = conexaoBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll();
        }

        public function actualizarUtlizador($id, $nome, $email){
            $sql = "update $this->tabela set nome=:nome, email=:email where id=:id";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":id", $id);

            return $statement -> execute();
        }

        public function delete($id){
            $sql = "delete from $this->tabela where id=:id";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":id", $id);
            return $statement -> execute();
        }

        public function selecionarUtilizador($email, $senha){
            $sql = "select id, email, senha from $this->tabela where email=:email and senha=:senha";
            $statement = ConexaoBaseDeDados::prepare($sql);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":senha", $senha);
            $statement -> execute();
            return $statement -> fetch();
        }
    } 
?>