<?php
    require_once "../bd/conexaoComBd.php";
    class PresencaDAO{
        private $tabela = "presenca";

        public function registar($administradorId, $estudanteId, $listaId, $data){
            $sql = "insert into $this->tabela(administrador_id, estudante_id, lista_id, data) values(:administradorId, :estudanteId, :listaId, :data)";

            $statement = ConexaoComBaseDeDados::prepare($sql);

            $statement -> bindParam(":administradorId", $administradorId, PDO::PARAM_INT);
            $statement -> bindParam(":estudanteId", $estudanteId, PDO::PARAM_INT);
            $statement -> bindParam(":listaId", $listaId, PDO::PARAM_INT);
            $statement -> bindParam(":data", $data);

            return $statement -> execute();
        }

        public function selecionarTodos(){
            $sql = "select presenca.id, presenca.lista_id, presenca.data, estudante.nome, estudante.sobrenome, estudante.turma_id from $this->tabela left join estudante on estudante.id = estudante_id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> execute();
            return $statement->fetchAll(); 
        }

        public function selecionarEstudanteId($estudante_id){
            $sql = "select estudante_id from $this->tabela where estudante_id=:estudante_id";
            $statement = ConexaoComBaseDeDados::prepare($sql);
            $statement -> bindParam(":estudante_id", $estudante_id);
            $statement -> execute();
            return $statement->fetchAll(); 
        }
    }
?>