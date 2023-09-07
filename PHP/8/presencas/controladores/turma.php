<?php
    require_once "../modelos/turmaDAO.php";
    class Turma{
        public function adicionarTurma($nome, $turno){
            $turma  = new TurmaDAO();
            $turma->registar($nome, $turno);
        }

        public function selecionarTurma($turma_id){
            $turma = new TurmaDAO();
            $turmaEncontrada = $turma->selecionarTurma($turma_id);
            return $turmaEncontrada;
        }

        public function selecionarTodasTurmas(){
            $turma = new TurmaDAO();
            $turmasEncontradas = $turma->selecionarTodos();
            return $turmasEncontradas;
        }
    }
?>