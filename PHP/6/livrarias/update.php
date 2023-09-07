<?php
include 'sessao.php';
require 'connect.php';

    if(isset($_POST['save'])) {
        $cmd = $conn->prepare('update livrarias set  localizacao=:localizacao, nome_livraria=:nome_livraria where  id=:id');
        $cmd->bindValue('id', $_POST['id']);
        $cmd->bindValue('nome_livraria', $_POST['nome_livraria']);
        $cmd->bindValue('localizacao', $_POST['localizacao']);
        $cmd->execute();
        header('location:listar.php');
    }

    $cmd = $conn->prepare('select * from livrarias where nome_livraria = :nome_livraria');
    $cmd->bindValue('nome_livraria', $_GET['nome_livraria']);
    $cmd->execute();
    $dados = $cmd->fetch(PDO::FETCH_OBJ);
?>

    <form method="post">
    <link rel="stylesheet" href="./style.css">
        <fieldset>
            <legend>ACTUALIZAR INFO DA LIVRARIA</legend>

            <table cellpadding="2" cellspacing="2">
                <tr>
                    <td>NOME DA LIVRARIA</td>
                    <td><?php echo $dados->nome_livraria; ?>
                    <input type="text" name="nome_livraria"></td>
                </tr>
                <tr>
                    <td>ID DA LIVRARIA</td>
                    <td><input type="text" name="id" value="<?php echo $dados->id; ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nova Localizacao</td>
                    <td><input type="text" name=" localizacao"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="save" value="Save"></td>
                </tr>        
            </table>
        </fieldset>
</form>