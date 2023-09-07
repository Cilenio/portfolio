<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
         <style>
            body{
                text-align:center;
            
              background-color: white;


h1 {
  color:  blue;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}

            }
         </style>
    <title>Document</title>
</head>
<body>
    <?php
  session_start();

    require_once("./connect.php");

    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['senha'])){
        include_once('./connect.php');
        $username= $_POST["username"];
        $senha= $_POST['senha'];

        $cmd = "SELECT * FROM usuario WHERE username='$username' and senha ='$senha'";
        $result=$conn -> query($cmd);
        if($result ->rowCount()< 1){
            unset($_SESSION['username']);
            unset($_SESSION['senha']);
           print_r("Erro usuario nao encontrado");
           header("location: index.php");
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['senha'] = $senha;
           header('location: listar.php');

        }
    }

?>


    <form action="index.php" method="post" id="container" style="width:500px;background-color:#0d350123; height:400px; border-radius:10px; align-items:center; text-align:center; margin:auto; margin-top:10%;">
        <legend style="text-align:center; margin:bottom:10px;">Login</legend>
        <fieldset border=1; style="text-align:center;">
            
         <div class="mb-3 row">
      
            <label for="nome" class="col-sm-2 col-form-label"></label>
            <br>
           
                <input type="text" class="form-control" id="nome" name="username" placeholder="username" style="margin-left:50px; width:400px;">
            </div>
        </div>

        <div class="mb-3 row">
        <label for="nome" class="col-sm-2 col-form-label"></label>
        <br>
        <div class="colp-sm-1">
            <input type="password" class="form-control" id="nome" name="senha" placeholder="senha" style="margin-left:50px; width:400px;">
        </div>
        </div>
            
        <section id="botoes" style="margin-left:30px;">
            <button type="submit" class="btn btn-success" style="marign:auto;" name="submit">iniciar sessao</button>
            <!-- <button type="submit" class="btn btn-success" style="marign:auto;">limpar</button> -->
        </section>

     </fieldset>

     </form>
</body>
</html>