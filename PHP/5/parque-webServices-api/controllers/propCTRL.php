<?php
require_once '../models/proprietarioDAO.php';
require_once '../controllers/sessCTRL.php';

$sessao = new sessaoController();
if ($sessao->verificarSessao()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $RSP = new stdClass();
            $dados = json_decode(($_POST['proprietario']));
            $proprietarioDAO = new proprietarioDAO();
            $register = $proprietarioDAO->registarProprietario(
                $dados->nome,
                $dados->sobrenome, $dados->email, $dados->endereco, $dados->sexo
            );
            if ($register == 1) {               
                header(('Content-type:aplication/json'));
                $RSP->seCriado = true;
                echo json_encode($RSP);
            } else {
                $RSP->seCriado = false;
                echo json_encode($RSP->seCriado );
            }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            header(('Content-type:aplication/json'));
            $proprietarioDAO = new proprietarioDAO();
            $RSP = $proprietarioDAO->selecionarTodos();
            echo json_encode($RSP);
        }
}
?>