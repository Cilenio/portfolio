<?php
    require_once '../controladores/proprietarioController.php';
    require_once '../modelos/proprietarioDAO.php';
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
    <title>ACTUALIZARR PROPRIETARIO</title>
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
        <a href="registarAdministrador.php"><button type="button" class="btn btn-dark">Adicionar Administrador </button> </a>
        <a href="vizualizarAdministradores.php"><button type="button" class="btn btn-dark"> LISTAR Administrador </button> </a>

      </nav>
       
    <div class="tabela"> 
        <div class="login">
            <h3 class="text-center">ACTUALIZARR PROPRIETARIO</h3>
            <form method="post">
                <div class="form-group">
                    <label class="form-label" for="email">Nome</label>
                    <input class="form-control" type="text" name="nome" id="email">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">E mail</label>
                    <input class="form-control" type="text" name="E-mail" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">sobrenome</label>
                    <input class="form-control" type="text" name="Sobrenome" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Endereco</label>
                    <input class="form-control" type="text" name="endereco" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Sexo</label>
                    <input class="form-control" type="text" name="Sexo" id="password">
                </div>
                
    
                
                <input type="submit" class="btn btn-success w-100" name="update" value="ACTUALIZAR">
            </form>
        </div>
    </div>
    </body>
</html>
<?php
   if(isset($_POST["update"])){
    $id = $_GET['id'];
    $nome = $_POST["nome"];
    $email = $_POST["E-mail"];
    $sobrenome = $_POST["Sobrenome"];
    $endereco = $_POST["endereco"];
    $sexo = $_POST["Sexo"];
    if(empty($id) || empty($nome) || empty($email) || empty($sobrenome) || empty($endereco) || empty($sexo)){
        echo" Os Campos email e senha sao obrigatorios";
    }else{
        $updateProprietarioDAO = new proprietarioController();
        $updateProprietarioDAO->update($id, $nome, $sobrenome, $email, $endereco, $sexo);
        header('location: ../interface/vizualizarProprietarios.php');
    }
}         
?>