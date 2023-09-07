<?php
    session_start();
    require_once "../modelos/administradorDAO.php";
    require_once "../modelos/sessaoDAO.php";

    class Administrador{
        private $sessaoID = "tpw3MAURO";
        public function adicionar($email, $nome, $senha){
            $administrador = new AdministradorDAO();
            $administrador ->registar($email, $nome, $senha);
        }
        public function verificarExistencia($email, $senha){
            $administrador = new AdministradorDAO();
            $administradorEncontrado = $administrador->selecionarAdministrador($email, $senha);

            if($administradorEncontrado != null){
                $sessao = new Administrador();
                $sessao->verificarCredenciais($email, $senha);
                header("location:../interfaces/inicio.php");
            }else{
                echo "Email ou senha invalidos";
            }
        }

        public function verificarCredenciais($email, $senha){
            $administrador = new AdministradorDAO();
            $administradorEncontrado = $administrador->selecionarAdministrador($email, $senha);
            if($administradorEncontrado != null){
                $sessao = new SessaoDAO();
                $token = uniqid('_M', true);
                $seValido = true;
                $administradoristradorId = $administradorEncontrado->id;
                
                $sessaoCriada = $sessao->registarSessao($token, $seValido, $administradoristradorId);

                if($sessaoCriada == 1){
                    setcookie($this->sessaoID, $token, time() + (86400 * 20), "/");
                    header("location:../interfaces/inicio.php");
                }else{
                    echo "Email ou palavra-passe invalido";
                }
            }
        }
        public function verificarAutenticacao(){

            if(isset($_COOKIE[$this->sessaoID])){
                $sessao = new SessaoDAO();
                $token = $_COOKIE[$this->sessaoID];
                $seValido = true;

                $sessaoSelecionada = $sessao->selecionarSessao($token, $seValido);

                if($sessaoSelecionada != null){
                    $_SESSION["uId"] = $sessaoSelecionada->administrador_id;
                    $_SESSION["token"] = $sessaoSelecionada->token;
                    return $_SESSION["uId"];
                }
            }else{
                header("location: ../interfaces/iniciarSessao.php");
            }
        }

        public function selecionarTodosAdmins(){
            $administrador = new AdministradorDAO();
            $todosAdministradores = $administrador->selecionarTodos();
            return $todosAdministradores;
        }
    }
?>