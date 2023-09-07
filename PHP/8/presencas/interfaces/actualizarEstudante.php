<?php
require_once "../controladores/estudante.php";

$id = $_GET['id'];

$estudante = new Estudante();
$estudanteEncontrado = $estudante->selecionarEstudante($id);
$nome = $estudanteEncontrado->nome;
$sobrenome = $estudanteEncontrado->sobrenome;
$sexo = $estudanteEncontrado->sexo;
$endereco = $estudanteEncontrado->endereco;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../interfaceG/estilos/beleza.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        label{
            color:white;
        }
    </style>
</head>

<body>
    <form method="post">
        <div class="box">
            <div class="container">
                <div class="top">
                    <header>Actualizar Estudante</header>
                </div>
                <div class="input-caixa">
                    <label for="">Nome:</label>
                    <input type="text" class="input" name="nome" value="<?php echo $nome; ?>">
                </div>
                <div class="input-caixa">
                <label for="">Sobrenome:</label>
                    <input type="text" class="input" name="sobrenome" value="<?php echo $sobrenome; ?>">
                </div>
                <div class="input-caixa">
                    <fieldset style="color: white; border: 2px solid white; margin-bottom: 10px;">
                        <legend>Sexo</legend>
                        <?php
                        if ($sexo == 'Masculino') {
                            echo '<input type="radio" name="sexo" id="masc" value="Masculino" checked>
                                <label for="masc">Masculino</label>
                                <br>
                                <input type="radio" name="sexo" id="fem" value="Feminino">
                                <label for="fem">Feminino</label>';
                        } else {
                            echo '<input type="radio" name="sexo" id="masc" value="Masculino">
                                <label for="masc">Masculino</label>
                                <br>
                                <input type="radio" name="sexo" id="fem" value="Feminino" checked>
                                <label for="fem">Feminino</label>';
                        }
                        ?>
                    </fieldset>
                </div>
                <div class="input-caixa">
                    <label for="">Endereco:</label>
                    <input type="text" class="input" name="endereco" value="<?php echo $endereco; ?>">
                </div>
                <div class="input-caixa" style="margin-bottom: 10px;">
                    <input type="submit" class="submit" name="actualizar" value="Actualizar">
                </div>
                <div class="input-caixa">
                    <input type="submit" class="submit" name="voltar" value="Voltar">
                </div>
                
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['actualizar'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        if (empty($nome) || empty($sobrenome) || empty($sexo) || empty($endereco)) {
            echo "Preencha todos campos";
        } else {
            $estudante = new Estudante();
            $estudante->actualizar($id, $nome, $sobrenome, $sexo, $endereco);
            header("location:../visualizarInterface/visuEstudante.php");
        }
    }

    if (isset($_POST['voltar'])) {
        header("location:../visualizarInterface/visuEstudante.php");
    }
    ?>
</body>

</html>