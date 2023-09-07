<?php
    require_once "../bd/conexaoComBd.php";

    class AdministradorDAO{
        private $tabela = "administrador";

        public function registar($email, $nome, $senha){
            $sql = "insert into $this->tabela(email, nome, senha) values(:email, :nome, :senha)";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":nome", $nome);
            $statement -> bindParam(":senha", $senha);

            return $statement -> execute();
        }

        public function selecionarTodos(){
            $sql = "select * from $this->tabela";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll(); 
        }

        public function selecionarAdministrador($email, $senha){
            $sql = "select id, email, senha from $this->tabela where email=:email and senha=:senha";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":email", $email);
            $statement -> bindParam(":senha", $senha);
            $statement -> execute();
            return $statement -> fetch();
        }
    }
?>