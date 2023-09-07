<?php
    require_once "../modelos/listaDAO.php";
    class Lista{
        public function adicionarLista($nome){
            $lista = new ListaDAO();
            $lista->registar($nome);
        }

        public function selecionarTodas(){
            $lista = new ListaDAO();
            $listasEncontradas = $lista->selecionarTodos();
            return $listasEncontradas;
        }

        public function selecionarLista($lista_id){
            $lista = new ListaDAO();
            $listaEncontrada = $lista->selecionarLista($lista_id);
            return $listaEncontrada;
        }
    }
?>