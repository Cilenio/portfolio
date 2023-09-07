<?php
include 'sessao.php';
?>
<!DOCTYPE html>
<html?>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Listar LIVRARIAS</title>
    <link rel="stylesheet" href="./style.css">
    </head>
<body>
        <form method="post">
                <table cellpadding="2" cellspacing="2">
                    <tr>
                        <td>NOME DA LIVRARIA</td>
                        <td><input type="text" name="nome_livraria"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="pesq" value="Procurar"></td>
                    </tr>
        </form>
<?php
    if(isset($_POST['nome_livraria'])){ 
        $valor=$_POST['nome_livraria']; 
        require 'connect.php'; 
        $pesq="%$valor%";
        $cmd = $conn->prepare('SELECT * FROM equipamento WHERE nome_livraria LIKE :n ORDER BY id ASC');
            if(isset($_POST['nome_livraria'])){ 
                $valor=$_POST['nome_livraria']; 
                require 'connect.php'; 
                $pesq="%$valor%";
                $cmd = $conn->prepare('SELECT * FROM livrarias
                WHERE nome_livraria LIKE :n ORDER BY id ASC');
                $cmd->bindValue(':n', $pesq);
                $cmd->execute();
        if($cmd->rowcount()>0){
            while($dados = $cmd->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td><?php echo $dados['id']; ?></td>
                    <td><?php echo $dados['nome_livraria']; ?></td>
                    <td><?php echo $dados['localizacao']; ?></td>
                    <td><a href="update.php?id=<?php echo $dados['id']; ?>">Editar</a></td>
                </tr>
<?php }} else{}?>
                <tr>
                    <td colspan="6"> <center>Nao foram encontrados registos!</td>
                <tr>
<?php } } ?> 

<?php 
    
    require 'connect.php';
    if(isset($_GET['action']) && $_GET['action']=='delete'){
        $cmd = $conn->prepare('delete from livrarias where id= :id');
        $cmd->bindParam('id', $_GET['id']);
        $cmd->execute();
        header('Location: listar.php');
    }
    $cmd = $conn->prepare('select * from livrarias');
    $cmd->execute()
?>

    <a href = 'gravarUsuarioS.php'>CADASTRAR USUARIO </a> 
    <a href="gravar.php">CADASTARSR LIVRARIA</a> 
    <a href="logout.php">SAIR</a> 


    <table cellpadding="2" cellspacing="2" border="1">
        <tr>
            <th colspan="5">LIVRARIAS DA CIDADE</th>
        </tr>
        <tr>
            <th>ID DA LIRVARIA</th>
            <th>NOME DA LIVRARIA</th>
            <th>LOCALIZACAO DA LIVRARIA</th>
            <th>ACCAO</th>
    </tr>

<?php while($dados = $cmd->fetch(PDO::FETCH_OBJ)) {  ?>
        <tr>
            <td><?php echo $dados->id; ?></td>
            <td><?php echo $dados->nome_livraria; ?></td>
            <td><?php echo $dados->localizacao; ?></td>
            <td><a href="listar.php?id=<?php echo $dados->id; ?>
            &action=delete" onclick="return confirm('Tem certeza que pretende apagar?')">Apagar</a>
            <a href="update.php?nome_livraria=<?php echo $dados->nome_livraria; ?>">Editar</a> </td>
        </tr>
<?php } ?>
    </table>
    
</body>
</html>