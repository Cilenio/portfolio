<?php
require_once "../controladores/administrador.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessao</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <h1>Iniciar Sessao</h1>
        <form method="post">
            <div class="container_area">
                <input class="container_input" type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="container_area">
                <input class="container_input" type="password" name="senha" required>
                <label>Senha</label>
            </div>
            <input class="container_submit" name="entrar" type="submit" value="Entrar">
            <div class="container_opcao">
            Quer criar conta? <a href="registar.php">Clique aqui</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['entrar'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $admin = new Administrador();
        $admin->verificarExistencia($email, $senha);
    }
    ?>
</body>
</html>