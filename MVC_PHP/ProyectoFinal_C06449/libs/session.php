<?php
    class Session{
        function __construct(){

        }

        function connectionSession(){
            if(!isset($_SESSION)){
                
                session_start();
                
            }else{
                if(isset($_SESSION['id'])){
                         $this->view->render('main/index');
                     }
            }
        }

        function isAuthenticated()
        {
            if (isset($_SESSION['id'])) {
                return true;
            } else {
                return false;
            }
        }
    }


    // function connectionSession(){
        //     //verificamos si existe una sesion abierta
        //     if(!isset($_SESSION)){
        //         //Como no existe la crea
        //         session_start();
        //     }

        //     //En caso de exitir
        //     if(!isset($_SESSION['idUser'])){
        //         //Me dirige hacia el dashboard o el main
        //     }
        //     else{
        //         echo 'Desconectado';

        //         echo 
        //         "<script>
        //             alert('Redireccionando, no esta autenticado');
        //             window.location='login';
        //         </script>";
        //     }
        // }
