<?php
require_once "../controladores/administrador.php";
require_once "../controladores/estudante.php";
require_once "../controladores/turma.php";
require_once "../controladores/presenca.php";
require_once "../controladores/lista.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Presenca</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
</head>

<body>
    <div class="div container_a">
        <button class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class=" container_submit"><a href="adicionarEstudante.php">Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="home container_submit"><a>Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Admins</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <div class="container" style="margin-top:50px;">
        <h1>Adicionar Presenca</h1>
        <form method="post">
            <div class="container_area">
                <label for="tr">Turma:</label>
                <select class="input" name="turma" id="tr">
                    <?php
                    $turma = new Turma();
                    $turmas = $turma->selecionarTodasTurmas();
                    foreach ($turmas as $chave => $valor) {
                        echo "<option value='$valor->id'>$valor->nome</option>";
                    }
                    ?>
                </select>
            </div>
            <input class="container_submit" name="procurar" type="submit" value="Procurar Estudante" style="margin-bottom: 5px;">
            <div class="container_area">
                <label for="est">Estudante:</label>
                <select class="input" name="estudante" id="est">
                <?php
                if (isset($_POST['procurar'])) {
                    $turma = $_POST['turma'];
                    $estudante = new Estudante();
                    $y = $estudante->selecionarEstudantesPelaTurma($turma);

                    foreach ($y as $chave => $valor) {
                        echo "<option value='$valor->id'>$valor->nome</option>";
                    }
                }
                ?>
                </select>
            </div>
            <div class="container_area">
                <label for="ls">Lista:</label>
                <select class="input" name="lista" id="ls">
                    <?php
                    $lista = new Lista();
                    $y = $lista->selecionarTodas();
                    foreach ($y as $chave => $valor) {
                        echo "<option value='$valor->id'>$valor->nome</option>";
                    }
                    ?>
                </select>
            </div>
            <input class="container_submit" name="adicionar" type="submit" value="Adicionar" style="margin-bottom: 5px;">
        </form>
    <?php
    if (isset($_POST['adicionar'])) {
        $admin = new Administrador();
        $administrador_id = $admin->verificarAutenticacao();

        $estudante_id = isset($_POST['estudante'])?$_POST['estudante']:"";
        $lista_id = $_POST['lista'];
        $data = date("Y-m-d H:i:s");

        if(!empty($estudante_id)) {
            $presenca = new Presenca();
            $presenca->adicionarPresenca($administrador_id, $estudante_id, $lista_id, $data);
            header("location:visualizarPresenca.php");
        }
    }
    ?>
</body>
</html>