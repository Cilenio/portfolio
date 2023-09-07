<?php
require_once '../models/viaturaDAO.php';
require_once '../controllers/sessCTRL.php';

$sessao = new sessaoController();
if ($sessao->verificarSessao()) {

    $RSP = new stdClass();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['viatura'])) {
            $dados = json_decode(($_POST['viatura']));
            $viaturaDAO = new viaturaDAO();
            $register = $viaturaDAO->registarViatura($dados->fabricante, $dados->ano_fabrico, $dados->matricula, $dados->modelo, $dados->propretario_id);
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
        if (isset($_POST['actualizar'])) {
            $dados = json_decode(($_POST['actualizar']));
            $updateViaturaDAO = new viaturaDAO();
            $update = $updateViaturaDAO->actualizarViatura($dados->id, $dados->fabricante, $dados->ano_fabrico, $dados->matricula, $dados->modelo, $dados->propretario_id);
            if($update == 1){
                $RSP->seActualizado = true;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            }
            header(('Content-type:aplication/json'));
            echo json_encode($RSP);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['buscarViaturas'])) {
            header(('Content-type:aplication/json'));
            $viaturaDAOg = new viaturaDAO();
            $RSP = $viaturaDAOg->selecionarTodos();
            echo json_encode($RSP);
        }
    }
}
?>