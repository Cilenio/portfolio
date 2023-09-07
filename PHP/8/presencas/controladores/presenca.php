<?php
    require_once "../modelos/presencaDAO.php";
    class Presenca{
        public function adicionarPresenca($administradorId, $estudanteId, $listaId, $data){
            $presenca = new PresencaDAO();
            $presenca->registar($administradorId, $estudanteId, $listaId, $data);
        }

        public function verSeEstaNumaPresenca($estudanteId){
            $presenca = new PresencaDAO();
            $estudante_id = $presenca->selecionarEstudanteId($estudanteId);
            return $estudante_id;
        }

        public function selecionarTodasPresensas(){
            $presenca = new PresencaDAO();
            $presencas = $presenca->selecionarTodos();
            return $presencas;
        }
    }
?>