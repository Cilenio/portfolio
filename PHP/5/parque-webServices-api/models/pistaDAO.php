<?php
require_once "../database/conexaoBaseDeDados.php";
class pistaDAO{
    private $tabela = 'pista';
    public function registarPista($fabricante,  $ano_fabrico, $matricula,$modelo, $propretario_id){
        $sql = "insert into $this->tabela(fabricante, ano_fabrico, matricula, modelo, propretario_id) values (:fabricante, :ano_fabrico, :matricula, :modelo, :propretario_id)";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':fabricante', $fabricante);
        $statement -> bindParam(':ano_fabrico', $ano_fabrico);
        $statement -> bindParam(':matricula', $matricula);
        $statement -> bindParam(':propretario_id',$propretario_id);
        $statement -> bindParam(':modelo', $modelo);
        return $statement -> execute();
    }
    public function delete($id){
        $sql = "delete from $this->tabela where id= :id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        return $statement -> execute();
    }
    public function selecionarTodos(){
        $sql = "select *from $this->tabela";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> execute();
       return $statement->fetchAll();
    }  
}
?> 