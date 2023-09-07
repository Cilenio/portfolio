<?php
require_once "../controladores/turma.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Listas</title>  
    <link rel="stylesheet" href="style/nav.css">   
</head>

<body>
    <div class="div container_a">
        <button  class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class="container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Adminis</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="home container_submit"><a>Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <h2 style="text-align: center; margin-bottom:10px;">Turmas</h2>
    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Turno</th>
            </tr>

            <?php

            $turma = new Turma();
            $y = $turma->selecionarTodasTurmas();
            foreach ($y as $key => $valor) {
                echo "<tr>
                        <td>$valor->id</td>
                        <td>$valor->nome</td>
                        <td>$valor->turno</td>
                    </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
