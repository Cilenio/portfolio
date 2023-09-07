<?php
require_once '../models/administradoresDAO.php';
require_once '../controllers/sessCTRL.php';

$sessao = new sessaoController();
$RSP = new stdClass();

if ($sessao->verificarSessao()) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dados = json_decode(($_POST['administrador']));
        $administradoresDAO = new administradoresDAO();
        $register = $administradoresDAO->registarAdministrador($dados->email, $dados->nome, $dados->senha);
        if ($register == 1) {
            $RSP->seCriado = true;
            header(('Content-type:aplication/json'));
            echo json_encode($RSP);
        } else {
            $RSP->seCriado = false;
            header(('Content-type:aplication/json'));
            echo json_encode($RSP);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['buscarAdministradores'])) {
            header(('Content-type:aplication/json'));
            $administradorDAO = new administradoresDAO();
            $RSP = $administradorDAO->selecionarTodos();
            echo json_encode($RSP);
        }
    }
}
?>