<?php
    class App{
        function __construct(){
            $url = isset($_GET['url']) ? $_GET['url'] : null;

            $url = rtrim($url, '/');

            //explode es para convertir un string en un vector
            //ej hola, mario, bienvenido, 2023
            //obtenemos: ['hola', 'mario', 'bienvenido', '2023']
            $url = explode('/', $url);


            if(empty($url[0])){
                $archivoController = 'controller/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }

            $archivoController = 'controller/'.$url[0].'.php';
            if(file_exists($archivoController)){
                require_once $archivoController;

                $controller = new $url[0]();
                $controller->loadModel($url[0]);
                //id=1, nombre= mario, apellido=jimenez, correo= mario@ucr.ac.cr
                //1/mario/jimenez/correo
                $nparam = sizeof($url); //obtengo cuantos elementos tiene la url
                //Viene con funcion
                if($nparam > 1){
                    //Viene con funcion y parametros
                    if($nparam > 2){
                        $param = [];
                        for ( $i = 2; $i < $nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        //pagina/consultar/1/23
                        $controller->{$url[1]}($param);
                    }
                    else{
                        $controller->{$url[1]}();
                    }
                }//Sin funcion
                else{
                    $controller->render();
                }
            }
            else{
                require_once 'controller/error.php';
                $controller = new Errores(); 
            }
        }
    }
