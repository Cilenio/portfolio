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
    <a href="listar.php">LISTAR AS LIVRARIAS</a> 
    <a href="gravarUsuarios.php">CADASTRAR USUARIO DO SISTEMA</a> 
    <a href="logout.php">SAIR</a> 


<?php
include 'sessao.php';
require  'connect.php';

if(isset($_POST['save'])) {
    $cmd = $conn->prepare('insert into livrarias( nome_livraria, localizacao)
    values( :nome_livraria, :localizacao)');
    $cmd->bindValue(':nome_livraria', $_POST['nome_livraria']);
    $cmd->bindValue(':localizacao', $_POST['localizacao']);
    $cmd->execute();
    header('location:listar.php');
}
?>
    <h3>CADASTRAR LIVRARIA</h3>
    <form method="post">
        <fieldset>
            <legend>INTRODUZA OS DADOS</legend>
                <table cellpadding="2" cellspacing="2">
                    <tr>
                        <td>Nome Da livraria</td>
                        <td><input type="nome_livraria" name="nome_livraria"></td>
                    </tr>
                    <tr>
                        <td>localizacao Da Livraria</td>
                        <td><input type="text" name="localizacao"></td>
                    </tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="save" value="Gravar"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
</body>
