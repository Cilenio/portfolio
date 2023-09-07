<?php
    require_once '../controladores/administradoresController.php';
    require_once '../controladores/sessaoController.php';
    $util = new sessaoController();
    $util->verificarAutenticacao();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTAR VIATURA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></head>
    <style>
        *{
        }
        body{
            background: rgb(68, 153, 148);
        }
        .navbar{
            margin-top: 2%;
           
        }
        .tabela{
            margin-top: 2%;
            margin-right: 60%;
            margin-left: 40%;
        }
    </style>
<body>
    <nav class="navbar ">
        <a href='registarProprietario.php'><button type="button" class="btn btn-dark">Adicionar Proprietarios</button></a>
        <a href="vizualizarProprietarios.php"><button type="button" class="btn btn-dark">Listar Proprietarios </button></a>
        <a href="registarViatura.php"><button type="button" class="btn btn-dark">Adicionar veiculos </button></a>
        <a href="vizualizarViatura.php"><button type="button" class="btn btn-dark"> Listar Veiculos</button> </a>
        <a href="registarParqueamento.php"><button type="button" class="btn btn-dark">Parquear veiculo </button>
        <a href="vizualizarParqueamento.php"><button type="button" class="btn btn-dark">historico Parqueamento </button> </a>
        <a href="registarAdministrador.php"><button type="button" class="btn btn-danger">Adicionar Administrador </button> </a>
        <a href="vizualizarAdministradores.php"><button type="button" class="btn btn-dark"> LISTAR Administrador </button> </a>

      </nav>
       
    <div class="tabela"> 
        <div class="login">
            <h1 class="text-center">Registar Administrador</h1>
            <form method="post">
                <div class="form-group">
                    <label class="form-label" for="email">EMAIL</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">NOME</label>
                    <input class="form-control" type="text" name="nome" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">SENHA</label>
                    <input class="form-control" type="password" name="senha" id="password">
                </div>                
                <input type="submit" class="btn btn-success w-100" name="registar" value="registar">
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST["registar"])){
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        if(empty($email) || empty($nome) ||empty($senha)){
            echo" Os Campos email e senha sao obrigatorios";
        }else{
            $util = new administradoresController();
            $util->adicionarAdministrador($email, $nome, $senha);
            header('location: ../interface/vizualizarAdministradores.php');
        }
    }
?>            