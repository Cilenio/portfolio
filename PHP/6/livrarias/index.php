<?php
setcookie("Cilenio",null,-1,"/");
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="formulario">
<form method="post">
    <h1>Login</h1>
    <fieldet>
        <label>Username</label><br>
        <input type="text" name="username"  > <br>
        <label>Password</label><br>
        <input type="senha" name="senha" ><br>
        <input type="submit" name="entrar" value="entrar" ><br>
    </fieldset>
    </form>
    </div>
</body>
</html>

<?php

if(isset($_POST["entrar"])) {
    
    include 'connect.php';
    $username = $_POST['username'];
    $password = md5($_POST['senha']);
    $cmd = $conn->prepare("select * from usuario where username=:username and password=:password");
    $cmd->bindParam(':username', $username);
    $cmd->bindParam(':password', $password);
    $cmd->execute();
    if($cmd->rowCount() > 0) {
        while($dados = $cmd->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['senha'] = $password;
            $sessionid = "Cilenio";
            $token = uniqid('_X', true);
            setcookie($sessionid,$token, time() + (86400 *15), "/" );
            header('Location: listar.php');
            exit();
        }      
    }else{
        echo "erro";
        header('refresh:2;url=index.php');
        exit();
    }
}
?> 
