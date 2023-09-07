<?php
    session_start();
    require_once "../modelos/utilizadorDAO.php";
    require_once "../modelos/sessaoDAO.php";

   /*$utilizadorDao = new UtilizadorDAO();
    $utilizadorDao -> regitar("Eke Cesar", "eke@cesar.com","Ea787");
    $y = $utilizadorDao->selecionarTodos();

    foreach($y as $key => $tt){
        echo $tt->nome." ".$tt->email."<br>";
    }

    $utilizadorDao -> actualizarUtlizador(5, "Robert", "robert@gmail.com");
    
    $utilizadorDao -> delete(21);*/
    
    class UtilizadorController{
        
        private $sessaoId = "tpw3SSID";

        public function registarUtilizador($nome, $email, $senha){
            $utilizadorDao = new UtilizadorDAO();
            $utilizadorDao -> registar($nome, $email, $senha);
        }

        public function verificarCredenciais($email, $senha){
            $utilizadorDao = new UtilizadorDAO();   
            $utilizadorEncontrado = $utilizadorDao->selecionarUtilizador($email, $senha);
            //echo "User: ".$utilizadorEncontrado->email;
            //print_r($utilizadorEncontrado);
            if ($utilizadorEncontrado != null){
                $sessao = new SessaoDao();
                $token = uniqid('_T', true);
                $seValido = true;
                $utilizadorId = $utilizadorEncontrado->id;

                $sessaoCriada = $sessao-> registarSessao($token, $seValido, $utilizadorId);

                if($sessaoCriada == 1){
                    setcookie($this->sessaoId, $token, time() + (86400 * 30), "/");
                    header("location: ../interfaces/inicio.php");
    
                }
            }else{
                echo "Email ou palavra-passe invalido";
            }
        }

        public function iniciarSessao($email, $senha){
            
        }

        public function gerarToken(){
            return uniqid('_T', true);
        }

        public function verificarAutenticacao(){

            if(isset($_COOKIE[$this->sessaoId])){
                $sessao = new SessaoDAO();
                $token = $_COOKIE[$this->sessaoId];
                $seValido = true;

                $sessaoSelecionada = $sessao->selecionarSessao($token, $seValido);

                if($sessaoSelecionada != null){
                    $_SESSION["uId"] = $sessaoSelecionada->utilizador_id;
                    $_SESSION["token"] = $sessaoSelecionada->token;
                    print_r($_SESSION["uId"]);
                    return true;
                }
            }else{
                header("location: ../interfaces/iniciarSessao.php");
            }
        }
    }
?>