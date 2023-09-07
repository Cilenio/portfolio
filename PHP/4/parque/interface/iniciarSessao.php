<?php
    require_once '../controladores/sessaoController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSAO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Iniciar sessao</h1>
        <form method="post">
            <div class="form-group">
                <label class="form-label" for="email">Endereco email</label>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Palavra Passe</label>
                <input class="form-control" type="password" id="password" name="senha">
            </div>
            <input type="submit" class="btn btn-success w-100" name="entrar" value="IniciarSessao">
        </form>
    </div> 
</body>
</html>
<?php
    if(isset($_POST["entrar"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        if(empty($email) || empty($senha)){
            echo" Os Campos email e senha sao obrigatorios";
        }else{
            $util = new sessaoController();
            $util->verificarCredenciais($email, $senha);
        }
    }
?>