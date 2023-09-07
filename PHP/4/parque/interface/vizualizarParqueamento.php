<?php
    require_once '../controladores/parqueamentoController.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>body{background: rgb(68, 153, 148);}.navbar{margin-top: 2%;}.tabela{
    margin-top: 2%;margin-right: 10%;margin-left: 10%;}</style>
    <title>Document</title>
</head>
<body>     
    <nav class="navbar ">
        <a href='registarProprietario.php'><button type="button" class="btn btn-dark">Adicionar Proprietarios</button></a>
        <a href="vizualizarProprietarios.php"><button type="button" class="btn btn-dark">Listar Proprietarios </button></a>
        <a href="registarViatura.php"><button type="button" class="btn btn-dark">Adicionar veiculos </button></a>
        <a href="vizualizarViatura.php"><button type="button" class="btn btn-dark"> Listar Veiculos</button> </a>
        <a href="registarParqueamento.php"><button type="button" class="btn btn-dark">Parquear veiculo </button>
        <a href="vizualizarParqueamento.php"><button type="button" class="btn btn-danger">historico Parqueamento </button> </a>
        <a href="registarAdministrador.php"><button type="button" class="btn btn-dark">Adicionar Administrador </button> </a>
        <a href="vizualizarAdministradores.php"><button type="button" class="btn btn-dark"> LISTAR Administrador </button> </a>
      </nav>
      <div class="tabela">
      <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">DATA DO PARQUEAMENTO</th>
              <th scope="col">FABRICANTE</th>
              <th scope="col">MODELO</th>
              <th scope="col">MATRICULA</th>
              <th scope="col">ESTADO</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $estado = 0;
                $actualizarEstado = new parqueamentoController();
                $actualizarEstado->actualizarEstado($id, $estado);
            }
                $listar = new parqueamentoController();
                $listar->parqueamentosSelecionados();
            ?>
          </tbody>
      </table>
    </div>
</body>
</html>

