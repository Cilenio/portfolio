<?php
    require_once "../modelos/estudanteDAO.php";
    class Estudante{
        public function adicionarEstudante($nome, $sobrenome, $sexo, $endereco, $turma_id){
            $estudante = new EstudanteDAO();
            $estudante->registar($nome,$sobrenome, $sexo, $endereco, $turma_id);
        }
        public function selecionarTodosEstudantes(){
            $estudante = new EstudanteDAO();
            $estudantesEncontrados = $estudante->selecionarTodos();
            return $estudantesEncontrados;
        }

        public function apagarEstudante($id){
            $estudante = new EstudanteDAO();
            $estudante->delete($id);
        }

        public function selecionarEstudante($id){
            $estudante = new EstudanteDAO();
            $estudanteEncontrado = $estudante->selecionarEstudante($id);
            return $estudanteEncontrado;
        }

        public function actualizar($id, $nome, $sobrenome, $sexo, $endereco){
            $estudante = new EstudanteDAO();
            $estudante->actualizarEstudante($id, $nome, $sobrenome, $sexo, $endereco);
        }
        public function selecionarEstudantesPelaTurma($id){
            $estudante = new EstudanteDAO();
            $estudantesEncontrados = $estudante->selecionarEstudantePelaIdDaTurma($id);
            return $estudantesEncontrados;
        }
    }
?>