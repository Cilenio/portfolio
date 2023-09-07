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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <title>Adicionar Estudante</title>

</head>

<body>
    <div class="div container_a">
        <button class="container_submit"><a href="adicionarLista.php">Adicionar Lista</a></button>
        <button class="home container_submit"><a>Adicionar Estudante</a></button>
        <button class="container_submit"><a href="adicionarTurma.php">Adicionar Turma</a></button>
        <button class="container_submit"><a href="adicionarPresenca.php">Adicionar Presenca</a></button>
        <button class="container_submit"><a href="inicio.php">Visualizar Admins</a></button>
        <button class="container_submit"><a href="visualizarEstudante.php">Visualizar Estudantes</a></button>
        <button class="container_submit"><a href="visualizarLista.php">Visualizar Listas</a></button>
        <button class="container_submit"><a href="visualizarTurma.php">Visualizar Turmas</a></button>
        <button class="container_submit"><a href="visualizarPresenca.php">Visualizar Presencas</a></button>
    </div>
    <div style="margin-top:70px;" class="container">
        <h1>Adicionar Estudante</h1>
        <form method="post">
            <div class="container_area">
                <input class="container_input" type="text" name="nome" required>
                <label>Nome</label>
            </div>
            <div class="container_area">
                <input class="container_input" type="text" name="sobrenome" required>
                <label>Sobrenome</label>
            </div>
            <div class="container_area">
                <label for="sx">Sexo:</label>
                <select name="sexo" id="sx">
                    <option value="feminimo">Feminino</option>
                    <option value="masculino">Masculino</option>
                </select>
            </div>
            <div class="container_area">
                <input class="container_input" type="text" name="endereco" required>
                <label>Endereco</label>
            </div>
            <div class="container_area">
                    <label for="tr">Turma:</label>
                    <select class="input" name="turma" id="tr">
                        <?php
                        $turma = new Turma();
                        $y = $turma->selecionarTodasTurmas();
                        foreach ($y as $chave => $valor) {
                            echo "<option value='$valor->id'>$valor->nome</option>";
                        }
                        ?>
                    </select>
                </div>
            <input class="container_submit" name="adicionar" type="submit" value="Adicionar" style="margin-bottom: 5px;">
      </form>
    </div>

    <?php
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $turmaId = $_POST['turma'];
        
        $estudante = new Estudante();
        $estudante->adicionarEstudante($nome, $sobrenome, $sexo, $endereco, $turmaId);
        header("location:visualizarEstudante.php");
    }
    ?>
</body>
</html>