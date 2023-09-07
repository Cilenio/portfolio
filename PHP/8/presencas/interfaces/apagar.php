<?php
require_once "../controladores/estudante.php";
require_once "../controladores/presenca.php";

$id = $_GET['id'];
$estudante = new Estudante();
$presenca = new Presenca();
$presencaest = $presenca->verSeEstaNumaPresenca($id);

if ($presencaest == null) {
    $estudante->apagarEstudante($id);
}
header("location:visualizarEstudante.php")
?>