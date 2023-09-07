<?php
require_once '../models/pistaDAO.php';
require_once '../controllers/sessCTRL.php';

$sessao = new sessaoController();
if ($sessao->verificarSessao()) {
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['buscarPista'])) {
        header(('Content-type:aplication/json'));
        $pistaDAO = new pistaDAO();
        $RSP = $pistaDAO->selecionarTodos();
        echo json_encode($RSP);
    }
}
}
?>