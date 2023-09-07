<?php
    require_once '../controladores/parqueamentoController.php';
    require_once '../controladores/sessaoController.php';
    require_once '../modelos/sessaoDAO.php';
    require_once '../controladores/pistaController.php';
    require_once '../controladores/viaturaController.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></head>
    <style>body{background: rgb(68, 153, 148);}.navbar{margin-top: 2%;}
    .tabela{margin-top: 2%;margin-right: 60%;margin-left: 40%;}</style>
<body>
    <nav class="navbar ">
        <a href='registarProprietario.php'><button type="button" class="btn btn-dark">Adicionar Proprietarios</button></a>
        <a href="vizualizarProprietarios.php"><button type="button" class="btn btn-dark">Listar Proprietarios </button></a>
        <a href="registarViatura.php"><button type="button" class="btn btn-dark">Adicionar veiculos </button></a>
        <a href="vizualizarViatura.php"><button type="button" class="btn btn-dark"> Listar Veiculos</button> </a>
        <a href="registarParqueamento.php"><button type="button" class="btn btn-danger">Parquear veiculo </button>
        <a href="vizualizarParqueamento.php"><button type="button" class="btn btn-dark">historico Parqueamento </button> </a>
        <a href="registarAdministrador.php"><button type="button" class="btn btn-dark">Adicionar Administrador </button> </a>
        <a href="vizualizarAdministradores.php"><button type="button" class="btn btn-dark"> LISTAR Administrador </button> </a>
      </nav>
    <div class="tabela"> 
        <div class="login">
            <h1 class="text-center">Registar Viatura</h1>
            <form method="post">
                <div class="form-group">
                    <label class="form-label" for="password">PropreatarioId</label>
                    <select name="pista_id" class="form-control">
                    <?php
                        $util = new pistaController();
                        $util->pistasSelecionada();
                        ?>
                    <input class="form-control" type="text" name="fabricante" id="email" disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Viatura ID</label>
                    <select name="viatura_id" class="form-control">
                    <?php
                            $viaturaController = new viaturaController();
                            $viaturaController->viaturasSelecionadasParque();
                        ?>
                </div>                
                <input type="submit" class="btn btn-success w-100" name="registar" value="registar">
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST["registar"])){
        $pista_id = $_POST["pista_id"];
        $viatura_id = $_POST["viatura_id"];
        $util = new ParqueamentoController();
        $sessaoID = "tpw3SSID";
        
        if(isset($_COOKIE[$sessaoID])){
            $sessao = new sessaoDAO();
            $token = $_COOKIE[$sessaoID];
            $se_valido = true;
            $sessaoSelecionada = $sessao->selecionarSessao($token, $se_valido);                      
            if($sessaoSelecionada != null){
                $administrador_id = $sessaoSelecionada->administrador_id;
            }
            if(empty($pista_id) ||empty($viatura_id)){
                echo" Os Campos email e senha sao obrigatorios";
            }else{
                $util->criarParqueamento(date('Y-m-d H:i:s'), 1 , $administrador_id, $pista_id, $viatura_id);
                header('location: ../interface/vizualizarParqueamento.php');
            }
        }
    }
?>