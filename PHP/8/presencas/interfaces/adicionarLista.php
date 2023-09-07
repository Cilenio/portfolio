<?php
require_once "../controladores/lista.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Lista</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
</head>

<body>
    <div class="div container_a">
        <button class="home container_submit"><a>Adicionar Lista</a></button>
        <button class="container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Admins</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <div class="container">
        <h1>Adicionar Lista</h1>
        <form method="post">
            <div class="container_area">
                <input class="container_input" type="text" name="nome" required>
                <label>Nome</label>
            </div>
            <input class="container_submit" name="adicionar" type="submit" value="Adicionar" style="margin-bottom: 5px;">
      </form>
    </div>
    <?php
    if (isset($_POST['adicionar'])) {
        $nome = strtolower($_POST['nome']);

        $lista = new Lista();
        $lista->adicionarLista($nome);
        header("location:visualizarLista.php");
    }
    ?>
</body>
</html>