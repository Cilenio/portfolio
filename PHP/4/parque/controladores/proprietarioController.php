<?php
require_once '../modelos/proprietarioDAO.php';
require_once '../modelos/viaturaDAO.php';
    class proprietarioController{
        public function criarProprietario($nome, $sobrenome, $email, $endereco, $sexo){
            $proprietarioDAO = new proprietarioDAO();
            $proprietarioDAO->registarProprietario($nome, $sobrenome, $email, $endereco, $sexo);
        }
        public function buscarProprietarios(){
            $proprietarioDAO = new proprietarioDAO();
            $proprietariosSelecionados = $proprietarioDAO->selecionarTodos(); 
            foreach($proprietariosSelecionados as $key => $value){
                echo "<option value='$value->id'>$value->nome $value->sobrenome</option>";
            }
        }
        public function proprietariosSelecionados(){
            $proprietarioDAO = new proprietarioDAO();
            $proprietariosSelecionados = $proprietarioDAO->selecionarTodos();
            foreach($proprietariosSelecionados as $key => $value){
                echo "<tr>
                        <td><i>$value->id</i></td>
                        <td><i> $value->nome </i></td>
                        <td><i>$value->sobrenome</i></td>
                        <td><i>$value->email</i></td>
                        <td><i>$value->endereco</i></td>
                        <td><i>$value->sexo</i></td>
                        <td> <a href='deleteProprietario.php?id=$value->id'><button type='button' class='btn btn-danger'>deletar</button></a></td>
                        <td> <a href='actualizarProprietario.php?id=$value->id'><button type='button' class='btn btn-warning'>Actualizar</button></a></td>
                        </form>
                    </tr>";
            }
        }
        function delete ($id){
            $proprietarioDAO = new proprietarioDAO();
            $proprietarioDAO->delete($id);
        }
        function update($id, $nome, $sobrenome, $email, $endereco, $sexo){
            $updateProprietarioDAO = new proprietarioDAO();
            $updateProprietarioDAO->actualizarProprietario($id, $nome, $sobrenome, $email, $endereco, $sexo);
        }
    }
?>