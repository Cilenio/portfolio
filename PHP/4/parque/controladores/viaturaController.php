<?php
require_once '../modelos/viaturaDAO.php';
    class viaturaController{
        public function adicionarViatura($fabricante, $ano_fabrico, $matricula, $modelo, $propretario_id){
            $viaturaDAO = new viaturaDAO();
            $viaturaDAO->registarViatura($fabricante, $ano_fabrico, $matricula, $modelo, $propretario_id);
        }
        public function buscarProprietarios(){
            $proprietarioDAO = new proprietarioDAO();
            $proprietariosSelecionados = $proprietarioDAO->selecionarTodos(); 
        }
        public function viaturasSelecionadas(){
            $viaturaDAO = new viaturaDAO();
            $viaturasSelecionada = $viaturaDAO->selecionarTodos();
            foreach($viaturasSelecionada as $key => $value){
                echo "<tr>
                        <td><i>$value->fabricante</i></td>
                        <td><i> $value->ano_fabrico </i></td>
                        <td><i>$value->modelo</i></td>
                        <td><i>$value->matricula</i></td>
                        <td><i>$value->propretario_id</i></td>
                        <td> <a href='deleteViatura.php?id=$value->id' class='btnTable'><button type='button' class='btn btn-danger'>deletar</button></a></td>
                        <td> <a href='actualizarViatura.php?id=$value->id'><button type='button' class='btn btn-warning'>Actualizar</button></a></td>
                        </form>
                    </tr>";
            }
        }
        public function viaturasSelecionadasParque(){
            $viaturaDAO = new viaturaDAO();
            $viaturasSelecionada = $viaturaDAO->selecionarTodos();
            foreach($viaturasSelecionada as $key => $value){
                echo "<option value='$value->id'>$value->fabricante Matricula: $value->matricula </option>";
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