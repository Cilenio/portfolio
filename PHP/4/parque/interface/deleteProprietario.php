<?php
    require_once '../controladores/proprietarioController.php';
        $id = $_GET["id"];
        $apagar = new proprietarioController();
        $apagar->delete($id);
        header('location: ../interface/vizualizarProprietarios.php');  
?>