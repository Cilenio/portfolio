<?php
    require_once '../controladores/utilizadorCtrl.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sessao</title>
        <link rel="stylesheet" href="./assets/style.css">
    </head>
    <body>
        <div class="container">
            <form method="post"> 
                <h3 class="container_title">Iniciar Sessao</h3>

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

                <button type="submit" name="entrar" class="container_button">
                Entrar
                </button>
            </form>
        </div>

        <?php
            if(isset($_POST['entrar'])){
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                if (empty($email) || empty($senha)){
                    echo "Os campos email e senha sao obrigatorios";
                }else{
                    $util = new UtilizadorController();
                    $util -> verificarCredenciais($email, $senha);
                    //echo "Token: ".$util->gerarToken(); 
                }
               
                //Normalizacao de base de dados -> Urgente
            }
        ?>
    </body>
    </html>
