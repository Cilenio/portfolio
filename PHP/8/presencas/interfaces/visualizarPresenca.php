<?php
require_once "../controladores/presenca.php";
require_once "../controladores/turma.php";
require_once "../controladores/lista.php";
require_once "../controladores/administrador.php";

$autenticacao = new Administrador();
$autenticacao->verificarAutenticacao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Presencas</title>
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
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="home container_submit"><a>Visualizar Presencas</a></button>
    </div>
    <h2 style="text-align: center; margin-bottom:10px;">Presencas</h2>
    <div>
        <table>
            <tr>
                <th>Id Presenca</th>
                <th>Data</th>
                <th>Nome do estudante</th>
                <th>Turma</th>
                <th>Lista</th>
            </tr>
            <?php
            $presenca = new Presenca();
            $y = $presenca->selecionarTodasPresensas();
            foreach ($y as $chave => $valor) {
                $turma_id = $valor->turma_id;
                $turma = new Turma();
                $turmaNome = $turma->selecionarTurma($turma_id);

                $lista_id = $valor->lista_id;
                $lista = new Lista();
                $listaNome = $lista->selecionarLista($lista_id);
                echo "<tr>
                        <td>$valor->id</td>
                        <td>$valor->data</td>
                        <td>$valor->nome $valor->sobrenome</td>
                        <td>$turmaNome->nome</td>
                        <td>$listaNome->nome</td>
                    </tr>";
                }
                ?>
        </table> 
</body>
</html>