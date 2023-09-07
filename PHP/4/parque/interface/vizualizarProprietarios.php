<?php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            margin-right: 10%;
            margin-left: 10%;
        }
    </style>
    <title>Vizualizar Proprietario</title>
</head>
<body>
    <nav class="navbar ">
        <a href='registarProprietario.php'><button type="button" class="btn btn-dark">Adicionar Proprietarios</button></a>
        <a href="vizualizarProprietarios.php"><button type="button" class="btn btn-danger">Listar Proprietarios </button></a>
        <a href="registarViatura.php"><button type="button" class="btn btn-dark">Adicionar veiculos </button></a>
        <a href="vizualizarViatura.php"><button type="button" class="btn btn-dark"> Listar Veiculos</button> </a>
        <a href="registarParqueamento.php"><button type="button" class="btn btn-dark">Parquear veiculo </button>
        <a href="vizualizarParqueamento.php"><button type="button" class="btn btn-dark">historico Parqueamento </button> </a>
        <a href="registarAdministrador.php"><button type="button" class="btn btn-dark">Adicionar Administrador </button> </a>
        <a href="vizualizarAdministradores.php"><button type="button" class="btn btn-dark"> LISTAR Administrador </button> </a>
      </nav>

      <div class="tabela">
      <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Sobrenome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Endereco</th>
              <th scope="col">Sexo</th>
              <th scope="col">Remover</th>
              <th scope="col">Actualizar</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $listar = new proprietarioController();
            $listar->proprietariosSelecionados();
        ?>
           
          </tbody>
      </table>
    </div>
</body>
</html>




                            