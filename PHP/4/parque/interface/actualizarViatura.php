<?php
    require_once '../controladores/viaturaController.php';
    require_once '../modelos/viaturaDAO.php';
    require_once '../controladores/proprietarioController.php';
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
    <link rel="stylesheet" href="assets/style.css"></head>
    <style>
        *{
        }
        body{
            background: rgb(68, 153, 148);
        }
        .navbar{
            margin-top: 0%;
           
        }
        .tabela{
            margin-top: 1%;
            margin-right: 40%;
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
            <h3 class="text-center">Actualizar Viatura Viatura</h3>
            <form method="post">
                <div class="form-group">
                    <label class="form-label" for="email">Fabricante</label>
                    <input class="form-control" type="text" name="fabricante" id="email">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Ano de Fabrico</label>
                    <input class="form-control" type="text" name="ano_fabrico" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Matriculao</label>
                    <input class="form-control" type="text" name="matricula" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">modelo</label>
                    <input class="form-control" type="text" name="modelo" id="password">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Propreatario</label>
                    <select name="propretario_id" class="form-control">
                    <?php
                        $util = new proprietarioController();
                        $util->buscarProprietarios();
                    ?>
                </div>      
                <input type="submit" class="btn btn-success w-100" name="update" value="registar">
            </form>
        </div>
    </div>


<?php
  if(isset($_POST["update"])){
    $id = $_GET['id'];
    $fabricante = $_POST["fabricante"];
    $ano_fabrico = $_POST["ano_fabrico"];
    $modelo = $_POST["modelo"];
    $matricula = $_POST["matricula"];
    $propretario_id = $_POST["propretario_id"];
    if(empty($id) || empty($fabricante)|| empty($ano_fabrico)|| empty($modelo)|| empty($matricula)|| empty($propretario_id)){
        echo" Os Campos email e senha sao obrigatorios";
    }else{
        $updateViaturaDAO = new viaturaController();
        $updateViaturaDAO->update( $id, $fabricante, $ano_fabrico, $matricula,$modelo, $propretario_id);
        header('location: ../interface/vizualizarViatura.php');
    }
}          
?>