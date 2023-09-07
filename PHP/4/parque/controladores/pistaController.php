<?php
require_once '../modelos/pistaDAO.php';
    class pistaController{
        public function adicionarViatura($fabricante, $ano_fabrico, $matricula, $modelo, $propretario_id){
            $viaturaDAO = new viaturaDAO();
            $viaturaDAO->registarViatura($fabricante, $ano_fabrico, $matricula, $modelo, $propretario_id);
        }
        public function pistasSelecionada(){
            $pistaDAO = new pistaDAO();
            $pistasSelecionada = $pistaDAO->selecionarTodos();
            foreach($pistasSelecionada as $key => $value){
                echo "<option value='$value->id'>$value->nome</option>";
            }
        }
        function delete ($id){
            $viaturaDAO = new viaturaDAO();
            $viaturaDAO->delete($id);
        }
        function update($id, $fabricante, $ano_fabrico, $matricula,$modelo, $propretario_id){
            $updateViaturaDAO = new viaturaDAO();
            $updateViaturaDAO->actualizarViatura($id, $fabricante, $ano_fabrico, $matricula,$modelo, $propretario_id);
        }
    }
?>