<?php
require_once '../modelos/parqueamentoDAO.php';
    class ParqueamentoController{
        public function criarParqueamento($data, $estado, $administrador_id, $pista_id, $viatura_id){
            $parqueamentoDAO = new parqueamentoDAO();
            $parqueamentoDAO->registarParqueamento($data, $estado, $administrador_id, $pista_id, $viatura_id);
        }
        public function parqueamentosSelecionados(){
            $parqueamentoDAO = new parqueamentoDAO();
            $parqueamentosSelecionados = $parqueamentoDAO->selecionarTodos();
            foreach($parqueamentosSelecionados as $key => $value){
                if($value->estado == 1){$oEstado ="parqueado";}else{$oEstado = "nao parqueado";}
                echo "<tr>
                        <td><i>$value->data</i></td>
                        <td><i>$value->fabricante</i></td>
                        <td><i>$value->modelo</i></td>
                        <td><i>$value->matricula</i></td>
                        <td> <a href='vizualizarParqueamento.php?id=$value->id'><button type='button' class='btn btn-danger'>$oEstado</button></a></td>
                        </form>
                    </tr>";
            }
        }
        public function actualizarEstado($id, $estado){
            $updateParqueamentoDAO = new parqueamentoDAO();
            $updateParqueamentoDAO->actualizarEstado($id, $estado);
        }
    }
?>