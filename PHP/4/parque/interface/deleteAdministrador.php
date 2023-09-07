<?php
    require_once '../controladores/administradoresController.php';
        $id = $_GET["id"];
        $apagar = new administradoresController();
        $apagar->delete($id);
        header('location: ../interface/vizualizarAdministradores.php');  
?>