<?php
require_once "../controladores/administrador.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <h1>Registar</h1>
        <form method="post">
            <div class="container_area">
                <input class="container_input" type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="container_area">
                <input class="container_input" type="text" name="nome" required>
                <label>Nome</label>
            </div>
            <div class="container_area">
                <input class="container_input" type="password" name="senha" required>
                <label>Senha</label>
            </div>
            <input class="container_submit" name="registar" type="submit" value="Registar">
            <div class="container_opcao">
              Tem Conta? <a href="iniciarSessao.php">Clique aqui</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['registar'])){
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $admin = new Administrador();
        $admin->adicionar($email, $nome, $senha);
        header("location:iniciarSessao.php");  
    }
    ?>
</body>

</html>