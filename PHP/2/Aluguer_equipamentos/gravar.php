<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="style_update.css">
    <body>


    <div class="topnav">

<a href="listar.php">Listar</a> 

<a href="gravar.php">Register</a> 

</div>

<?php


session_start();
require  'connect.php';
if(isset($_POST['save'])) {
    $cmd = $conn->prepare('insert into equipamento(id_equipamento, nome_equipamento, preco_dia)
    values(:id_equipamento, :nome_equipamento, :preco_dia)');
    $cmd->bindValue(':id_equipamento', $_POST['id_equipamento']);
    $cmd->bindValue(':nome_equipamento', $_POST['nome_equipamento']);
    $cmd->bindValue(':preco_dia', $_POST['preco_dia']);
    $cmd->execute();

header('location:listar.php');

}
 ?>
<div>
<form method="post">
<fieldset>

<legend>Informações do equipamento</legend>

<table cellpadding="2" cellspacing="2">


<tr>

<td>Nome Equipamento</td>
<td><input type="nome_equipamento" name="nome_equipamento"></td>
</tr>

<tr>
<td>Preço por dia</td>
<td><input type="number" name="preco_dia">
</td>
</tr>

<td>&nbsp;</td>
<td><input type="submit" name="save" value="Gravar"></td>
</tr>
</table>
</fieldset>
</form>
</div>


