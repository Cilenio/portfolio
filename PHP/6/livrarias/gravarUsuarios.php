<!DOCTYPE html>
        <head>
            <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=, initial-scale=1.0">
            <title>Pesquisar</title>
            <link rel="stylesheet" href="./style.css">
        </head>
<html>
<body> 
    <ul>
    <a href="listar.php">LISTAR AS LIVRARIAS</a> 
    <a href="gravar.php">CADASTRAR LIVRARIA</a> 
    <a href="logout.php">SAIR</a> 
    </ul>


<?php
include 'sessao.php';
require  'connect.php';

require 'connect.php';
    if(isset($_POST['salvar'])) {
        $cmd = $conn->prepare('insert into usuario(username, nome, password) values(:username,:nome, :password)');
        $cmd->bindValue(':username', $_POST['username']);
        $cmd->bindValue(':password', md5($_POST['password']));
        $cmd->bindValue(':nome', $_POST['fullname']);
        $cmd->execute();
        header('location:listar.php');
} ?> 
<div class="formulario">
    <form method="post">
        <fieldset>
            <legend>Informações do Usuarios</legend>
                <table cellpadding="2" cellspacing="2">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td><input type="password" name="fullname"></td>
                    </tr
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="salvar"value="Gravar"></td>
                    </tr>
                </table>
        </fieldset>
    </form>
    </div>
</body>
