<?php
require_once "../database/conexaoBaseDeDados.php";
class parqueamentoDAO{
    private $tabela = 'parqueamento';
    public function registarParqueamento($data, $estado, $administrador_id, $pista_id, $viatura_id){
        $sql = "insert into $this->tabela(data, estado, administrador_id, pista_id, viatura_id) values (:data, :estado, :administrador_id, :pista_id, :viatura_id)";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':data', $data);
        $statement -> bindParam(':estado', $estado);
        $statement -> bindParam(':administrador_id', $administrador_id);
        $statement -> bindParam(':pista_id',$pista_id);
        $statement -> bindParam(':viatura_id', $viatura_id);
        return $statement -> execute();
    }

    public function actualizarEstado($id, $estado){
        $sql = "update $this->tabela set estado=:estado where id=:id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        $statement -> bindParam(':estado', $estado);     
        return $statement -> execute();
    } 

    public function actualizarParueamento($id, $pista_id){
        $sql = "update $this->tabela set pista_id=:pista_id where id=:id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        $statement -> bindParam(':pista_id', $pista_id);     
        return $statement -> execute();
    } 
    
    public function selecionarTodos(){
        $sql = "select parqueamento.id, parqueamento.viatura_id, parqueamento.data,parqueamento.estado,
        viatura.fabricante, viatura.matricula, viatura.modelo from $this->tabela left join viatura on viatura.id = viatura_id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> execute();
       return $statement->fetchAll();
    }
}
?> 