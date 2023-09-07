<?php
session_start();
require_once '../models/administradoresDAO.php';
require_once '../models/sessaoDAO.php';
$sessaoID = "tpw3SSID";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["sessao"])){
        $dados = json_decode(($_POST['sessao']));
        $RSP = new stdClass();

        $administradoresDAO = new administradoresDAO();
        $validar = $administradoresDAO->selecionarAdministrador($dados->email, $dados->senha);

        if ($validar != null) {
            $sessao = new sessaoDAO();
            $token = uniqid("_T", true);
            $seValido = true;
            $administradorID = $validar->id;
            $sessaoCriada = $sessao->registarSessao($token, $seValido, $administradorID);

            if ($sessaoCriada == 1) {
                setcookie($sessaoID, $token, time() + (86400 * 30), "/");
                $RSP->seCriada = true;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            }
        } else {
            header(('Content-type:aplication/json'));
            echo json_encode($RSP);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET["vSessao"])){
        header(('Content-type:aplication/json'));
        echo json_encode($_SESSION["uId"]); 
    }
}

class sessaoController{
    public function verificarSessao(){
        $RSP = new stdClass();
        $RSP->estaAutenticado = false;

        if (isset($_COOKIE["tpw3SSID"])) {
            $sessao = new sessaoDAO();
            $token = $_COOKIE["tpw3SSID"];
            $se_valido = 1;
            $validar = $sessao->selecionarSessao($token, $se_valido);
            if ($validar != null) {
                $_SESSION["uId"] = $validar->administrador_id;
                $_SESSION["token"] = $validar->token;
                $RSP->estaAutenticado = true;
                return $RSP->estaAutenticado;
            } else {
                return $RSP->estaAutenticado;
            }
        } else {
            return $RSP->estaAutenticado;
        }
    }
}
?>