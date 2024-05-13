<?php
class Grupos extends Controller{
    function __construct(){
        parent::__construct();
        parent::connectionSession();

        $this->view->datos = [];
        $this->view->mensaje = "Seccion Grupos";
        $this->view->mensajeResultado = ""; 
        
        if (!parent::isAuthenticated()) {
            header("Location: " . constant('URL') . "");
            exit(); // Detener la ejecución del método actual
        }
    }

    function render(){
        $datos = $this->model->getGrupos();               
        $this->view->datos = $datos;
        $this->view->render('grupos/index');
    }

    function crear(){   //para ver la vista                   
        $this->view->datos = [];
        $this->view->mensaje = "Crear Grupos";
        $this->view->render('grupos/crear');
    }

    function insertarGrupo(){
        //var_dump($_POST);
        if ($this->model->insertarGrupo($_POST)){
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Nuevo Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }

    function detalle(){                      
        $this->view->datos = [];
        $this->view->mensaje = "Detalles del Cursos";
        $this->view->render('cursos/detalle');
    }

    function verGrupos( $param = null ){        
        $id = $param[0];
        $datos = $this->model->verGrupos($id);        
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle grupo";
        $this->view->render('grupos/detalle');
    }

    function actualizargrupo(){
        //var_dump($_POST);
        if ($this->model->actualizargrupo($_POST)){

            $datos = new classGrupos();

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
        $this->view->mensaje = "Detalle Grupo";
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->view->render('grupos/detalle');
    }  
    
    
    function eliminargrupo( $param = null ){   
        $id = $param[0];
        if ($this->model->eliminargrupo($id)){
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Se eliminó el Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se eliminó el Registro
                </div>';
        }
        
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }
}
