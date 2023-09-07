<?php
session_start();
require_once '../modelos/administradoresDAO.php';
require_once '../modelos/sessaoDAO.php';
    class sessaoController{
        private $sessaoID = "tpw3SSID";
        public function verificarAutenticacao(){
            if(isset($_COOKIE[$this->sessaoID])){
                $sessao = new sessaoDAO();
                $token = $_COOKIE[$this->sessaoID];
                $se_valido = true;
                $sessaoSelecionada = $sessao->selecionarSessao($token, $se_valido);
                if($sessaoSelecionada != null){
                    $_SESSION["uId"] = $sessaoSelecionada->administrador_id;
                    $_SESSION["token"] = $sessaoSelecionada->token;
                    return true;}
            }else{
                header("location: ../interface/iniciarSessao.php");
            }
        }
        public function verificarCredenciais($email, $senha){
            $administradoresDAO = new administradoresDAO();
            $administradorEncontrado = $administradoresDAO->selecionarAdministrador($email, $senha);
            print_r($administradorEncontrado);
            if($administradorEncontrado != null){
                $sessao = new sessaoDAO();
                $token =  uniqid("_T", true);
                $seValido = true;
                $administradorID = $administradorEncontrado->id;
                $sessaoCriada = $sessao->registarSessao($token, $seValido, $administradorID);

                if($sessaoCriada == 1){
                    setcookie($this->sessaoID, $token, time() + (86400 * 30), "/");
                    header("location: ../interface/vizualizarAdministradores.php");
                }
            }else{
                echo "<br>";
                echo "Email ou palavra-Passe invalidos";
            }
        }
    }
?>