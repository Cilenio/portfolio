<?php
require_once '../modelos/administradoresDAO.php';
require_once '../modelos/sessaoDAO.php';
    class administradoresController{
        public function adicionarAdministrador($email, $nome, $senha){
            $administradoresDAO = new administradoresDAO();
            $administradoresDAO->registarAdministrador($email, $nome, $senha);
        }
        public function proprietariosSelecionados(){
            $administradorDAO = new administradoresDAO();
            $administradorDAO = $administradorDAO->selecionarTodos();
            foreach($administradorDAO as $key => $value){
                echo "<tr>
                        <td><i>$value->email</i></td>
                        <td><i> $value->nome </i></td>
                        <td><i>$value->senha</i></td>
                        <td> <a href='deleteAdministrador.php?id=$value->id' ><button type='button' class='btn btn-danger'>deletar</button></a></td>
                        <td> <a href='actualizarAdministradores.php?id=$value->id'><button type='button' class='btn btn-warning'>Actualizar</button></a></td>
                        </form>
                    </tr>";
            }
        }
        public function delete ($id){
            $administradorDelete = new administradoresDAO();
            $administradorDelete->delete($id);
        }
        public function update($id, $email, $nome, $senha){
            $updateAdministradorDAO = new administradoresDAO();
            $updateAdministradorDAO->actualizarAdministrador($id, $email, $nome, $senha);
        }
    }
?>