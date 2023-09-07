<?php
require_once "../controladores/turma.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Turma</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">  
</head>

<body>
    <div class="div container_a">
        <button class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class=" container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="home container_submit"><a>Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Admins</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <div class="container">
        <h1>Adicionar Turma</h1>
        <form method="post">
            <div class="container_area">
                <input class="container_input" type="text" name="nome" required>
                <label>Nome</label>
            </div>
            <div class="container_area">
                <label for="sx">Turno:</label>
                <select name="turno" id="sx">
                    <option value="diurno">Diurno</option>
                    <option value="nocturno">Nocturno</option>
                </select>
            </div>
            <input class="container_submit" name="adicionar" type="submit" value="Adicionar" style="margin-bottom: 5px;">
        </form>
    </div>

    <?php
    if (isset($_POST['adicionar'])) {
        $nome = ($_POST['nome']);
        $turno = $_POST['turno'];

        $turmaadd = new Turma();
        $turmaadd->adicionarTurma($nome, $turno);
        header("location:visualizarTurma.php");
    }
    ?>
</body>

</html>