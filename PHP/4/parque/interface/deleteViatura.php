<?php
    require_once '../controladores/viaturaController.php';
        $id = $_GET["id"];
        $apagar = new viaturaController();
        $apagar->delete($id);
        header('location: ../interface/vizualizarViatura.php');
?>