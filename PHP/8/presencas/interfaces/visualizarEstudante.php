<?php
require_once "../controladores/estudante.php";
require_once "../controladores/turma.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Estudantes</title>
    <link rel="stylesheet" href="style/nav.css"> 
    <style>
        .btn{
            text-decoration: underline;
            color: black;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="div container_a">
        <button  class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class="container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Adminis</a></button>
        <button class="home container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <h2 style="text-align: center; margin-bottom:10px;">Estudantes</h2>
    <div>   
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Sexo</th>
                <th>Endereco</th>
                <th>Turma</th>
            </tr>

            <?php

            $estudante = new Estudante();
            $turma = new Turma();
            $y = $estudante->selecionarTodosEstudantes();
            foreach ($y as $key => $valor) {
                $turmaEncontrada = $turma->selecionarTurma($valor->turma_id);
                echo "<tr>
                        <td>$valor->id</td>
                        <td>$valor->nome</td>
                        <td>$valor->sobrenome</td>
                        <td>$valor->sexo</td>
                        <td>$valor->endereco</td>
                        <td>$turmaEncontrada->nome</td>
                        <td>
                            <a class='btn' href='actualizarEstudante.php?id=$valor->id'><strong>Actualizar</strong></a>
                            <a class='btn' href='apagar.php?id=$valor->id'><strong>Apagar</strong></a>
                        </td>
                    </tr>";
            }

            ?>
        </table>
    </div>
</body>

</html>
