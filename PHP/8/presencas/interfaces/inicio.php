<?php
require_once "../controladores/administrador.php";
require_once "../controladores/lista.php";
require_once "../controladores/presenca.php";
$autenticacao = new Administrador();
$autenticacao->verificarAutenticacao();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Admins</title>
    <link rel="stylesheet" href="style/nav.css">
</head>

<body>
    <div class="div container_a">
        <button  class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class="container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="home container_submit"><a>Visualizar Adminis</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <h2 style="text-align: center; margin-bottom:10px;">Administradores</h2>
    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Senha</th>
            </tr>
            <?php
            $administradores = new Administrador();
            $y = $administradores->selecionarTodosAdmins();
            foreach ($y as $chave => $valor) {
                echo "<tr>
                        <td>$valor->id</td>
                        <td>$valor->email</td>
                        <td>$valor->nome</td>
                        <td>$valor->senha</td>
                    </tr>";
                }
                ?>
        </table>  
    </div>
</body>

</html>