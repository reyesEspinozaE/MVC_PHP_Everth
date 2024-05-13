<?php

    class Cursos extends Controller{
        function __construct(){
            parent::__construct();
            parent::connectionSession();
    
            $this->view->datos = [];
            $this->view->mensaje = "Seccion Cursos";
            $this->view->mensajeResultado = "";
            
            if (!parent::isAuthenticated()) {
                header("Location: " . constant('URL') . "");
                exit(); // Detener la ejecución del método actual
            }
        }
        function render(){
            $datos = $this->model->getCursos();               
            $this->view->datos = $datos;
            $this->view->render('cursos/index');
        }

        function crear(){
                        
            $this->view->datos = [];
            $this->view->mensaje = "Crear Cursos";
            $this->view->render('cursos/crear');
        }
    
        function insertarCurso(){
            //var_dump($_POST);
            if ($this->model->insertarCurso($_POST)){
                $mensajeResultado = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        Nuevo Registro
                    </div>';
            }else{
                $mensajeResultado = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        No se Registró
                    </div>';
            }
            $this->view->mensajeResultado = $mensajeResultado;        
            $this->render();
        }

        function verCursos( $param = null ){        
            $id = $param[0];
    
            $datos = $this->model->verCursos($id);        
            $this->view->datos = $datos;
            $this->view->mensaje = "Detalle Curso";
            $this->view->render('cursos/detalle');
        }
    
        //Funcion para actualizar un curso
        function actualizarcurso(){
            if ($this->model->actualizarcurso($_POST)){
    
                $datos = new classCursos();
    
                foreach ($_POST as $key => $value) {
                    # code...
                    $datos->$key= $value;
                }
    
                $mensajeResultado = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        Actualizacion de Registro
                    </div>';
            }else{
                $mensajeResultado = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        No se actualizo el Registro
                    </div>';
            }
            $this->view->datos = $datos;
            $this->view->mensaje = "Detalle Curso";
            $this->view->mensajeResultado = $mensajeResultado;        
            $this->view->render('cursos/detalle');
        }    
    
        //Funcion para eliminar un curso
        function eliminarcurso( $param = null ){   
            $id = $param[0];
            if ($this->model->eliminarcurso($id)){
                $mensajeResultado = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        Se elimino el Registro
                    </div>';
            }else{
                $mensajeResultado = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        No se elimino el Registro
                    </div>';
            }
            $this->view->mensajeResultado = $mensajeResultado;        
            $this->render();
        }
    }
