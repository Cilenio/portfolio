<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>







    <form method="post">

        <div class="search-box">

            <input type="text" class="search-txt" name="nome_equipamento" placeholder="Pesquisar"></td>


            <input type="submit" class="search-button" name="pesq" value="search">


        </div>

    </form>



    <?php

    //intrução para Pesquisar
    
    if (isset($_POST['nome_equipamento'])) {
        $valor = $_POST['nome_equipamento'];
        require 'connect.php';
        $pesq = "%$valor%";
        $cmd = $conn->prepare('SELECT * FROM equipamento
            WHERE nome_equipamento LIKE :n ORDER BY id_equipamento ASC');

        $cmd->bindValue(':n', $pesq);
        $cmd->execute();
        if ($cmd->rowcount() > 0) {

            while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <td>
                        <?php echo $dados['id_equipamento']; ?>
                    </td>
                    <td>
                        <?php echo $dados['nome_equipamento']; ?>
                    </td>
                    <td>
                        <?php echo $dados['preco_dia']; ?>
                    </td>
                    <td><a href="update.php?id=<?php echo $dados['id_equipamento']; ?>">Editar</a>
                    </td>
                </tr>

                <?php
            }
        } else { ?>
            <tr>
                <td colspan="6">
                    <center>Nao
                        foram encontrados registos!
                </td>
            <tr>
                <?php
        }
    }
    ?>



        <?php
        //Metodo para listar 
        session_start();
        // include 'sessao.php';
        require 'connect.php';

        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $cmd = $conn->prepare('delete from equipamento where id_equipamento= :id_equipamento');
            $cmd->bindValue('id_equipamento', $_GET['id_equipamento']);
            $cmd->execute();
        }
        $cmd = $conn->prepare('select * from equipamento');
        $cmd->execute()

            ?>


        <header>

            <div class="topnav">

                <a href="gravar.php" class="nav-link">Register </a>

                <a href="index.php" class="nav-link">Home</a>

            </div>

        </header>



        <table class="content-table">

            <tr>
                <thead>
                    <th>id_equipamento</th>
                    <th>nome_equipamento</th>
                    <th>preco_dia</th>
                    <th>Alterações</th>

            </tr>
            </thead>


            <?php while ($dados = $cmd->fetch(PDO::FETCH_OBJ)) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $dados->id_equipamento; ?>
                        </td>
                        <td>
                            <?php echo $dados->nome_equipamento; ?>
                        </td>
                        <td>
                            <?php echo $dados->preco_dia; ?>
                        </td>
                        <td>
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <a href="listar.php?id_equipamento =<?php echo $dados->id_equipamento; ?>
                
                &action=delete" onclick="return confirm('Tem certeza que pretende apagar?')" class="btn btn-danger">
                                        Apagar</a>

                                    <a href="update.php?nome_equipamento=<?php echo $dados->nome_equipamento; ?>"
                                        class="btn btn-info">Editar</a>


                                    <a href="alugar.html" class="btn btn-sucess">Aluguer</a>


                        </td>
                    </tr>

                    <?php
            }
            ?>
            </tbody>
        </table>


</body>

</html>