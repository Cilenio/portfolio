<?php
require_once "../database/conexaoBaseDeDados.php";
class administradoresDAO{
    private $tabela = 'administrador';
    public function registarAdministrador($email, $nome, $senha){
        $sql = "insert into $this->tabela(email, nome, senha) values (:email, :nome, :senha)";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':email', $email);
        $statement -> bindParam(':nome', $nome);
        $statement -> bindParam(':senha', $senha);
        return $statement -> execute();
    }
    public function actualizarAdministrador($id, $email, $nome, $senha){
        $sql = "update $this->tabela set email=:email, nome=:nome, senha=:senha where id=:id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        $statement -> bindParam(':email', $email);
        $statement -> bindParam(':nome', $nome);
        $statement -> bindParam(':senha', $senha);
        return $statement -> execute();
    }
    public function selecionarAdministrador($email, $senha){
        $sql = "select id, email, senha from $this->tabela where email=:email and senha=:senha";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':email', $email);
        $statement -> bindParam(':senha', $senha);
        $statement -> execute();
        return $statement->fetch();
    }
    public function delete($id){
        $sql = "delete from $this->tabela where id= :id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        try{
            return $statement -> execute();
        }catch(Exception $e){
            return false;
        }
    }
    public function selecionarTodos(){
        $sql = "select *from $this->tabela";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> execute();
       return $statement->fetchAll();
    }
}
?> 