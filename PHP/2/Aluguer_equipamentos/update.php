<?php
session_start();
require 'connect.php';
if(isset($_POST['save'])) {

    /*nao está funcionando*/
    $cmd = $conn->prepare('update equipamento set  preco_dia =:preco_dia, where id_equipamento = :id_equipamento');
    $cmd->bindValue('id_equipamento', $_POST['id_equipamento']);
    $cmd->bindValue('preco_dia', $_POST['preco_dia']);
    $cmd->execute();

header('location:listar.php');
}


//seleccao de dados para edicao

    $cmd = $conn->prepare('SELECT *FROM  equipamento where nome_equipamento = :nome_equipamento');
    $cmd->bindValue('nome_equipamento', $_GET['nome_equipamento']);
    $cmd->execute();
    $dados = $cmd->fetch(PDO::FETCH_OBJ);

?>

             <form method="post">
            <fieldset>
         <legend>Informações do Equipamento</legend>
          <table cellpadding="2" cellspacing="2">

        <tr>
        <td>Nome Equipamento</td>
        <td><?php echo $dados->nome_equipamento; ?>
        <input type="text" name="nome_equipamento"
        value="<?php echo $dados->nome_equipamento; ?>">
        </td>
        </tr>
        <tr>
        <td>ID Equipamento</td>
        <td><input type="text" name="id_equipamento" value="<?php echo $dados->id_equipamento; ?>"></td>
        </tr>

        <tr>
        <td>Preço por dia</td>
        <td><input type="text" name=" preco_dia"></td>
        </tr>



       <tr>
         <td>&nbsp;</td>
        <td><input type="submit" name="save" value="Save"></td>
        </tr>

        
    </table>
    </fieldset>
    </form>