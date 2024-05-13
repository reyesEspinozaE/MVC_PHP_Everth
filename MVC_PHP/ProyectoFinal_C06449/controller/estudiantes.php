<?php
class Estudiantes extends Controller{
    function __construct(){
        parent::__construct();
        parent::connectionSession();

        $this->view->datos = [];
        $this->view->grupos = [];
        $this->view->mensaje = "Sección estudiantes";
        $this->view->mensajeResultado = "";
        
        if (!parent::isAuthenticated()) {
            header("Location: " . constant('URL') . "");
            exit(); // Detener la ejecución del método actual
        }
        
    }
    function render(){
        $datos = $this->model->getEstudiante();               
        $this->view->datos = $datos;
        $this->view->render('estudiantes/index');
    }

    function crear(){   //para ver la vista                   
        $this->view->datos = [];
        $grupos = $this->model->getGrupos();               
        $this->view->grupos = $grupos;
        $this->view->mensaje = "Crear estudiante";
        $this->view->render('estudiantes/crear');
    }

    function insertarEstudiante(){
        //var_dump($_POST);
        if ($this->model->insertarEstudiante($_POST)){
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

    function verEstudiantes( $param = null ){        
        $id = $param[0];

        $datos = $this->model->verEstudiantes($id);        
        $this->view->datos = $datos;
        $grupos = $this->model->getGrupos();               
        $this->view->grupos = $grupos;
        $this->view->mensaje = "Detalle estudiante";
        $this->view->render('estudiantes/detalle');
    }

    //actualizarestudiante
    function actualizarEstudiante(){
        //var_dump($_POST);
        if ($this->model->actualizarEstudiantes($_POST)){

            $datos = new classEstudiantes();

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
        $this->view->mensaje = "Detalle estudiantes";
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->view->render('estudiantes/detalle');
    }    

    //eliminarestudiante
    function eliminarEstudiante( $param = null ){   
        $id = $param[0];
        if ($this->model->eliminarEstudiante($id)){
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
