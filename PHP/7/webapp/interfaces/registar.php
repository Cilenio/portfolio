<?php
    require_once '../controladores/utilizadorCtrl.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Criar conta</title>
        <link rel="stylesheet" href="./assets/style.css">
    </head>
    <body>
        <div class="container">
            <form method="post"> 
                <h3 class="container_title">Crie a sua conta</h3>

                <input 
                type="text"
                name="utilizador"
                placeholder="Nome do utlizador"
                class="container_input">

                <input 
                type="text"
                name="email"
                placeholder="Email"
                class="container_input">

                <input 
                type="password"
                name="senha"
                placeholder="Senha"
                class="container_input">

                <button type="submit" name="registar" class="container_button">
                Criar conta
                </button>
            </form>
        </div>

        <?php
            if(isset($_POST['registar'])){
                $nome = $_POST['utilizador'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                if (empty($nome) || empty($email) || empty($senha)){
                    echo "Os campos nome, email e senha sao obrigatorios";
                }else{
                    $util = new UtilizadorController();
                    $util -> registarUtilizador($nome, $email, $senha);
                }
            }
        ?>
    </body>
    </html>
