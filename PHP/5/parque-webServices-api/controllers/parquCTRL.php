<?php
require_once '../models/parqueamentoDAO.php';
require_once '../controllers/sessCTRL.php';

$sessao = new sessaoController();

if ($sessao->verificarSessao()) {
    $RSP = new stdClass();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['buscarParqueamentos'])) {
            header(('Content-type:aplication/json'));
            $parqueamentoDAO = new parqueamentoDAO();
            $RSP = $parqueamentoDAO->selecionarTodos();
            echo json_encode($RSP);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['estado'])) {
            $dados = json_decode(($_POST['estado']));
            $updateParqueamentoDAO = new parqueamentoDAO();
            $update = $updateParqueamentoDAO->actualizarEstado($dados->id, 0);
            if ($update == 1) {
                $RSP->seActualizado = true;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            } else {
                $RSP->seActualizado = false;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            }
        }
        if (isset($_POST['actualizar'])) {
            $dados = json_decode(($_POST['actualizar']));
            $updateParqueamentoDAO = new parqueamentoDAO();
            $update = $updateParqueamentoDAO->actualizarParueamento($dados->id, $dados->pista_id);
            if ($update == 1) {
                $RSP->seActualizado = true;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            } else {
                $RSP->seActualizado = false;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            }
        }
        if (isset($_POST['parquear'])) {
            $dados = json_decode(($_POST['parquear']));
            $parqueamentoDAO = new parqueamentoDAO();
            $parquear = $parqueamentoDAO->registarParqueamento(date('Y-m-d H:i:s'), $dados->estado, $dados->administrador_id, $dados->pista_id, $dados->viatura_id);
            if ($parquear == 1) {
                $RSP->seParqueado = true;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            } else {
                $RSP->seParqueado = false;
                header(('Content-type:aplication/json'));
                echo json_encode($RSP);
            }

        }
    }
}
?>