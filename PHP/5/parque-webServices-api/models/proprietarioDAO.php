<?php
require_once "../database/conexaoBaseDeDados.php";
class proprietarioDAO{
    private $tabela = 'propretario';
    public function registarProprietario($nome, $sobrenome, $email, $endereco, $sexo){
        $sql = "insert into $this->tabela(nome, sobrenome, email, endereco, sexo) values (:nome, :sobrenome, :email, :endereco, :sexo)";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':nome', $nome);
        $statement -> bindParam(':sobrenome', $sobrenome);
        $statement -> bindParam(':email', $email);
        $statement -> bindParam(':endereco',$endereco);
        $statement -> bindParam(':sexo', $sexo);
        return $statement -> execute();
    }
    public function actualizarProprietario($id, $nome, $sobrenome, $email, $endereco, $sexo){
        $sql = "update $this->tabela set nome=:nome, sobrenome=:sobrenome, email=:email, endereco=:endereco, sexo=:sexo where id=:id";
        $statement = conexaoBaseDeDados::prepare($sql);
        $statement -> bindParam(':id', $id);
        $statement -> bindParam(':nome', $nome);
        $statement -> bindParam(':sobrenome', $sobrenome);
        $statement -> bindParam(':email', $email);
        $statement -> bindParam(':endereco',$endereco);
        $statement -> bindParam(':sexo', $sexo);
        return $statement -> execute();
    }
    public function selecionarUtilizador($email, $senha){
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